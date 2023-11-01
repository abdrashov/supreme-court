<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(9)->create();

        if (!User::where('email', 'user@user.com')->exists())
            User::factory()->create([
                'name' => 'user',
                'email' => 'user@user.com',
            ]);
    }
}
