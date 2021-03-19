<?php

namespace App\Eloquent\Interfaces;


interface AuthInterface
{
    /**
     * Authenticate a user
     * @param array $credentials
     * @return mixed
     */
    public function login(array $credentials);


    /**
     * Activate the given used id
     * @param  int    $userId
     * @param  string $code
     * @return mixed
     */
    public function activate($userId, $code);


    /**
     * Log the user out of the application.
     * @return mixed
     */
    public function logout();

    /**
     * Create a reminders code for the given user
     * @param $user
     * @return mixed
     */
    public function createReminderCode($user);

    /**
     * Completes the reset password process
     * @param $user
     * @param  string $code
     * @param  string $password
     * @return bool
     */
    public function completeResetPassword($user, $code, $password);

    /**
     * Determines if the current user has access to given permission
     * @param $permission
     * @return bool
     */
    public function hasAccess($permission);

    /**
     * Check if the user is logged in
     * @return mixed
     */
    public function check();

    /**
     * Get the ID for the currently authenticated user
     * @return int
     */
    public function id();
}
