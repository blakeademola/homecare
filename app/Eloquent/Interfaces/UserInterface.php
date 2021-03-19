<?php

namespace App\Eloquent\Interfaces;


interface UserInterface
{

    public function getAll();

    public function createUser(array $data);


}
