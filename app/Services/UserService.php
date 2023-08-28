<?php


namespace App\Services;

use App\Models\User;

class UserService
{
    public function createUser($username, $phonenumber)
    {
        return User::create([
            'name' => $username,
            'phone_number' => $phonenumber,
        ]);
    }
}
