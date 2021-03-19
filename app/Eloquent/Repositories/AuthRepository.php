<?php

namespace App\Eloquent\Repositories;


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
        // TODO: Implement activate() method.
    }

    /**
     * Create a reminders code for the given user
     * @param $user
     * @return mixed
     */
    public function createReminderCode($user)
    {
        // TODO: Implement createReminderCode() method.
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
        // TODO: Implement completeResetPassword() method.
    }

    /**
     * Determines if the current user has access to given permission
     * @param $permission
     * @return bool
     */
    public function hasAccess($permission)
    {
        // TODO: Implement hasAccess() method.
    }

    /**
     * Check if the user is logged in
     * @return mixed
     */
    public function check()
    {
        // TODO: Implement check() method.
    }

    /**
     * Get the ID for the currently authenticated user
     * @return int
     */
    public function id()
    {
        // TODO: Implement id() method.
    }
}
