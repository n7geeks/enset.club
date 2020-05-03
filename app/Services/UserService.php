<?php


namespace App\Services;


use App\User;

class UserService
{
    public function getSelectItems()
    {
        return User::query()->get(['first_name', 'last_name', 'id'])->pluck('fullName', 'id');
    }
}
