<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Friendship;

class FriendshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Friendship::create([
            'Player1_ID' => 25,
            'Player2_ID' => 35
        ]);
        Friendship::create([
            'Player1_ID' => 25,
            'Player2_ID' => 45
        ]);
        Friendship::create([
            'Player1_ID' => 25,
            'Player2_ID' => 55
        ]);
        Friendship::create([
            'Player1_ID' => 55,
            'Player2_ID' => 45
        ]);
        Friendship::create([
            'Player1_ID' => 85,
            'Player2_ID' => 95
        ]);
        Friendship::create([
            'Player1_ID' => 95,
            'Player2_ID' => 25
        ]);
    }
}
