<?php

namespace App\Eloquent\Interfaces;


interface UserInterface
{

    public function getAll();

    public function getAllWithoutJoin();

    public function create(array $data);

    public function find($id);

    public function update($model, array $data);

    public function getById($column, $id);

    public function department($id);

}
