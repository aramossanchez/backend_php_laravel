<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'PartyID' => 5,
            'PlayerID' => 25
        ]);
        Member::create([
            'PartyID' => 5,
            'PlayerID' => 35
        ]);
        Member::create([
            'PartyID' => 5,
            'PlayerID' => 45
        ]);
        Member::create([
            'PartyID' => 15,
            'PlayerID' => 55
        ]);
        Member::create([
            'PartyID' => 25,
            'PlayerID' => 75
        ]);
    }
}
