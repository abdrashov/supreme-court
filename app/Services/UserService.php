<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function getByNameEmail($name_email): ?User
    {
        return User::where(fn($q) => $q
            ->orWhere('name', $name_email)
            ->orWhere('email', $name_email)
        )->first();
    }

    public static function store($name, $email, $password): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}
