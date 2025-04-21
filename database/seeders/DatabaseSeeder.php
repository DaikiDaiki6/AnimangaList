<?php

namespace Database\Seeders;

use App\Models\Animangalist;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $animangalists = Animangalist::factory(20)->create();

        User::factory(10)->create()->each(function ($user) use ($animangalists) {
            $user->animangalists()->attach(
                $animangalists->random(3)->pluck('id')->toArray()
            );
        });
    }
}
