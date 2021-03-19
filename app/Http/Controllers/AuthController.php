<?php

namespace App\Http\Controllers;

use App\Eloquent\Interfaces\AuthInterface;
use App\Http\Requests\PasswordResetRequest;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Eloquent\Interfaces\UserInterface;

class AuthController extends Controller
{
    protected $auth, $user;
    public function __construct(AuthInterface $auth, UserInterface $user)
    {
        $this->auth = $auth;
        $this->user = $user;
    }

    public function getLogin()
    {
        return view('pages.auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $authStatus = $this->auth->login($credentials);

        if ($authStatus) {
            return redirect()->intended(route('dashboard'))->with('success', 'You are successfully logged in');
        }


        return redirect()->route('login')->with('error', $authStatus);
    }

    public function getLogout()
    {

        $this->auth->logout();

        Session::flash('success', 'You have successfully logout. Hope to see you soon');

        return redirect()->route('login');
    }

    public function getForget()
    {
        return view('pages.auth.forget');
    }

    public function postForget(Request $request)
    {
        $user = $this->user->findByFirst('email', $request['email']);

        if (!$user) {
            Session::flash('warning', 'Email does not exist!');
            return redirect()->route('login');
        }

        if($user->blocked)
        {
            Session::flash('warning', 'Account has been blocked. Kindly contact the system administrator.');
            return redirect()->route('login');
        }

        try
        {
            $this->user->resetPassword($user);
        }
        catch (\Exception $e)
        {
            Session::flash('error', 'Password reset not successful. Try again');
            return redirect()->route('login');
        }
        finally
        {
            Session::flash('success', 'A password reset link has been sent to your email');
            return redirect()->route('login');
        }

    }

    public function editPassword($id, $token)
    {
        try
        {
            $dec_id = decrypt($id);
        }
        catch (DecryptException $e)
        {
            Session::flash('error', 'Invalid request');
            return redirect()->route('login');
        }
        $user = $this->user->findSentinelId($dec_id);

        if (Reminder::exists($user, $token))
        {
            return view('pages.auth.password_reset', compact('id', 'token'));
        }
        else
        {
            Session::flash('warning', 'Sorry, the password reset link has expired');
            return redirect()->route('login');
        }
    }

    public function updatePassword(PasswordResetRequest $request, $id, $code)
    {
        $user = $this->user->findSentinelId(decrypt($id));

        $reminder = Reminder::exists($user, $code);

        if (! $reminder)
        {
            Session::flash('warning', 'Invalid request');

            return redirect()->route('login');
        }

        Reminder::complete($user, $code, $request['password']);

        Session::flash('success', 'Password updated successfully');

        return redirect()->route('login');
    }

    public function getActivate($userId, $code)
    {
        $dec_id = decrypt($userId);

        if ($this->auth->activate($dec_id, $code)) {

            Session::flash('success', 'Account activated you can now login');
        }

        Session::flash('error', 'There was an error with the activation');

        return redirect('auth/login');
    }
}
