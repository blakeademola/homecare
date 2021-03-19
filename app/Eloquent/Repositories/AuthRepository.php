<?php

namespace App\Eloquent\Repositories;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Eloquent\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AuthRepository implements AuthInterface
{
    /**
     * Authenticate a user
     * @param array $credentials
     * @param bool $remember Remember the user
     * @return mixed
     */
    public function login(array $credentials, $remember = false)
    {
        try {
            if ((Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) ||
                (Auth::attempt(['phone_number' => $credentials['email'], 'password' => $credentials['password']]))) {
                $user = Auth::User();
                Session::put('user', $user);
                $user = Session::get('user');
                return $user;
            }
        } catch (\Exception $e) {
            return 'Invalid login credentials';
        }
    }

    /**
     * Log the user out of the application.
     * @return bool
     */
    public function logout()
    {
        Auth::logout();

    }

    /**
     * Activate the given used id
     * @param int $userId
     * @param string $code
     * @return mixed
     */
    public function activate($userId, $code)
    {
        $user = Sentinel::findById($userId);

        $success = Activation::complete($user, $code);
        if ($success) {
//            event(new UserHasActivatedAccount($user));
        }

        return $success;
    }

    /**
     * Create a reminders code for the given user
     * @param \Modules\Users\Repositories\UserInterface $user
     * @return mixed
     */
    public function createReminderCode($user)
    {
        $activation = Activation::exists($user) ?: Activation::create($user);

        return $activation->code;
    }

    /**
     * Completes the reset password process
     * @param $user
     * @param string $code
     * @param string $password
     * @return bool
     */
    public function completeResetPassword($user, $code, $password)
    {
        return Reminder::complete($user, $code, $password);
    }

    /**
     * Determines if the current user has access to given permission
     * @param $permission
     * @return bool
     */
    public function hasAccess($permission)
    {
        if (!Sentinel::check()) {
            return false;
        }

        return Sentinel::hasAccess($permission);
    }

    /**
     * Check if the user is logged in
     * @return mixed
     */
    public function check()
    {
        return Sentinel::check();
    }

    /**
     * Check if the user is logged in
     * @return mixed
     */
    public function getUserRoleId()
    {
        $user = $this->check();
        if ($user) {
            return $user->roles->first()->id;
        }

        return null;
    }

    /**
     * Get the ID for the currently authenticated user
     * @return int
     */
    public function id()
    {
        if (!$user = $this->check()) {
            return;
        }

        return $user->id;
    }

}
