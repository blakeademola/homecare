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

    public function getById($column, $id)
    {
        return $this->user::where($column, $id)->get();
    }

    public function createUserWithRole(array $data, $role)
    {
        $password = $data['password'];

        $data['password'] = $this->hashPassword($data['password']);

        $user = $this->create($data);

        $user->roles()->attach($role);

        $data['id'] = encrypt($user->id);

        $data['first_name'] = $user->first_name;

        $activation = Activation::create($user);

        $data['activation_code'] = $activation->code;

        $data['password'] = $password;

        event(new UserRegistered($data));

        return $user;
    }

    public function updateUserAndRole($user, $data, $role)
    {
        $user->roles()->sync($role);

        $user = $this->update($user, $data);

        return $user;
    }

    public function updateUserPermissions($user, $data)
    {
        $user = $this->update($user, $data);

        return $data;
    }

    public function resetPassword(User $user)
    {
        $sUser = $this->findSentinelId($user->id);

        if ($sUser) {
            ($reminder = Reminder::exists($sUser)) || ($reminder = Reminder::create($sUser));
            event(new PasswordReset($sUser, $reminder));
        }
    }

    public function getAllWithoutJoin()
    {
        return $this->user::get();
    }

    public function findSentinelId($user)
    {
        return Sentinel::findById($user);
    }

    public function getAll()
    {
        $query = DB::select(
            "select usr.id, concat( usr.first_name, ' ', usr.last_name) as 'fullname', usr.email, brn.name, ro.name as designation, dp.name as department from users usr left join branches brn on usr.branch_id = brn.id 
                    left join role_users ru on usr.id = ru.user_id 
                    left join roles ro on ru.role_id = ro.id 
                    left join departments dp on ro.dept_id = dp.id"
        );
        return $query;
    }

    public function department($id)
    {

        return $this->user::whereHas('roles', function ($query) use ($id) {
            $query->where('dept_id', '=', $id);
        })->get();
    }


    private function hashPassword($password)
    {
        return Hash::make($password);
    }

    public function create(array $data)
    {

    }

    public function find($id)
    {

    }

    public function update($model, array $data)
    {

    }


}
