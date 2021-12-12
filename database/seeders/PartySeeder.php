<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Party;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Party::create([
            'name' => 'Vente a jugar al lolete',
            'OwnerID' => 95,
            'GameID' => 45
        ]);

        Party::create([
            'name' => 'lolillos',
            'OwnerID' => 85,
            'GameID' => 45
        ]);

        Party::create([
            'name' => 'titanes y parkour',
            'OwnerID' => 25,
            'GameID' => 15
        ]);
    }
}
