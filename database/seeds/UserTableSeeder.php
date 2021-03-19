<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::updateOrCreate(['email' => 'test@gmail.com'],
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'test@gmail.com',
                'phone_number' => '09876543212',
                'user_type' => 'ADMIN',
                'password' => Hash::make('password'),
                'email_verified_at' => \Carbon\Carbon::now(),
            ]);

    }

}
