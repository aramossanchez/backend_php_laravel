<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'message' => '¿Alguien para un 1 vs 1?',
            'date' => '2021-12-11',
            'FromPlayer' => 95,
            'PartyID' => 5,
        ]);
        Message::create([
            'message' => 'Cuando quieras',
            'date' => '2021-12-11',
            'FromPlayer' => 25,
            'PartyID' => 5,
        ]);
        Message::create([
            'message' => 'Busco duo en bot',
            'date' => '2021-12-11',
            'FromPlayer' => 85,
            'PartyID' => 15,
        ]);
        Message::create([
            'message' => 'a farmear puntos de armas',
            'date' => '2021-12-11',
            'FromPlayer' => 25,
            'PartyID' => 25,
        ]);
        Message::create([
            'message' => 'Cuenta conmigo.',
            'date' => '2021-12-11',
            'FromPlayer' => 35,
            'PartyID' => 25,
        ]);
    }
}
