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


}
