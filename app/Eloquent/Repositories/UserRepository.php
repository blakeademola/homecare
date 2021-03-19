<?php

namespace App\Eloquent\Repositories;

use App\Eloquent\Interfaces\UserInterface;
use App\Events\PasswordReset;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;


class UserRepository implements UserInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createUser(array $data)
    {
        $user = $this->user::updateOrCreate(['email' => $data['email']], $data);
        return $user;
    }

    public function getAll()
    {

    }


}
