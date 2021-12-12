<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PlayerSeeder::class,
            GameSeeder::class,
            PartySeeder::class,
            MessageSeeder::class,
            MemberSeeder::class,
            Friendship::class,
        ]);
    }
}
