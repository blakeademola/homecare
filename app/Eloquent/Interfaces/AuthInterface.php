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
     * Log the user out of the application.
     * @return mixed
     */
    public function logout();


}
