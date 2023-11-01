<?php

namespace Database\Seeders;

use App\Models\Arena;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arenas = Arena::factory(2)->create();

        $user_count = User::count();

        foreach ($arenas as $arena)
            User::inRandomOrder()
                ->limit(rand(2, $user_count))
                ->get()
                ->map(function ($user) use ($arena) {
                    $arena->users()->attach([
                        'user_id' => $user->id,
                    ]);
                });
    }
}
