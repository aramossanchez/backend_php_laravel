<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '12345678',
            'role' => 'admin',
            'steamUsername' => 'admin01',
            'originUsername' => 'admin01',
            'epicgamesUsername' => 'admin01',
            'battlenetUsername' => 'admin01',
            'riotUsername' => 'admin01'
        ]);

        User::create([
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => '12345678',
            'role' => 'user',
            'steamUsername' => 'user01',
            'originUsername' => 'user01',
            'epicgamesUsername' => 'user01',
            'battlenetUsername' => 'user01',
            'riotUsername' => 'user01'
        ]);

        User::create([
            'username' => 'armandohyeah',
            'email' => 'armandoramossanchez@gmail.com',
            'password' => '14651as5fg191a',
            'role' => 'user',
            'steamUsername' => 'armandohyeah',
            'originUsername' => 'armandohyeah',
            'epicgamesUsername' => 'armandohyeah',
            'battlenetUsername' => 'Armandohyeah-9856',
            'riotUsername' => 'armandohyeah'
        ]);
        
        User::create([
            'username' => 'martin08',
            'email' => 'martin@gmail.com',
            'password' => 'adsf19qwer',
            'role' => 'user',
            'steamUsername' => 'Martin-08',
            'originUsername' => null,
            'epicgamesUsername' => null,
            'battlenetUsername' => null,
            'riotUsername' => null
        ]);
        
        User::create([
            'username' => 'carmina90',
            'email' => 'carmina@gmail.com',
            'password' => 'asdd1519v1a9sd10f',
            'role' => 'user',
            'steamUsername' => 'Carmina-90',
            'originUsername' => 'Carmina90',
            'epicgamesUsername' => 'Carmina-90',
            'battlenetUsername' => null,
            'riotUsername' => null
        ]);
        
        User::create([
            'username' => 'iria5',
            'email' => 'iria@gmail.com',
            'password' => 'er1g5d1fg890',
            'role' => 'user',
            'steamUsername' => 'IriA-005',
            'originUsername' => null,
            'epicgamesUsername' => null,
            'battlenetUsername' => null,
            'riotUsername' => null
        ]);
        
        User::create([
            'username' => 'MarioRS',
            'email' => 'mrs@gmail.com',
            'password' => '0f98a01f8a18',
            'role' => 'user',
            'steamUsername' => 'MarioRS',
            'originUsername' => 'MarioRS',
            'epicgamesUsername' => null,
            'battlenetUsername' => null,
            'riotUsername' => null
        ]);

        User::create([
            'username' => 'manolo60',
            'email' => 'manolo6060@gmail.com',
            'password' => 'a9f48e01f5a',
            'role' => 'user',
            'steamUsername' => null,
            'originUsername' => null,
            'epicgamesUsername' => null,
            'battlenetUsername' => 'Manolo60-8568',
            'riotUsername' => null
        ]);

        User::create([
            'username' => 'carmen60',
            'email' => 'carmensanchezt@gmail.com',
            'password' => 'as1df91e981f',
            'role' => 'user',
            'steamUsername' => null,
            'originUsername' => null,
            'epicgamesUsername' => null,
            'battlenetUsername' => 'Carmen60-5542',
            'riotUsername' => 'Carmen-nemraC'
        ]);

        User::create([
            'username' => 'victorS',
            'email' => 'victor@gmail.com',
            'password' => '1ad9sf1091d',
            'role' => 'user',
            'steamUsername' => null,
            'originUsername' => null,
            'epicgamesUsername' => null,
            'battlenetUsername' => null,
            'riotUsername' => 'rotcivLITTLE'
        ]);

        User::create([
            'username' => 'BlasLlario',
            'email' => 'blasllario@gmail.com',
            'password' => '1gh91g89h',
            'role' => 'user',
            'steamUsername' => null,
            'originUsername' => 'blcrfe28',
            'epicgamesUsername' => null,
            'battlenetUsername' => null,
            'riotUsername' => null
        ]);

        User::create([
            'username' => 'sergio-gonzalez',
            'email' => 'sergiogonzalez@gmail.com',
            'password' => '1r4rt98d4s2f',
            'role' => 'user',
            'steamUsername' => 'erBilly',
            'originUsername' => 'erBilly',
            'epicgamesUsername' => 'erBilly',
            'battlenetUsername' => 'erBilly-8965',
            'riotUsername' => null
        ]);
    }
}
