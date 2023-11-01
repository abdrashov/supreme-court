<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Get a user by name or email.
     *
     * @param string $name_email - Name or email of the user.
     * @return User|null - Returns the user object or null if the user is not found.
     */
    public static function getByNameEmail(string $name_email): ?User
    {
        return User::where(fn($q) => $q
            ->orWhere('name', $name_email)
            ->orWhere('email', $name_email)
        )->first();
    }

    /**
     * Create a new user and store it in the database.
     *
     * @param string $name - User's name.
     * @param string $email - User's email.
     * @param string $password - User's password.
     * @return User - Returns the created user object.
     */
    public static function store(string $name, string $email, string $password): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}
