<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'title' => 'Counter Strike',
            'thumbnail_url' => 'https://ih1.redbubble.net/image.1123456637.4226/flat,750x,075,f-pad,750x1000,f8f8f8.jpg',
            'url' => 'https://blog.counter-strike.net/'
        ]);

        Game::create([
            'title' => 'Titanfall 2',
            'thumbnail_url' => 'https://m.media-amazon.com/images/I/51NdylVTJtL._AC_.jpg',
            'url' => 'https://www.origin.com/esp/es-es/store/titanfall/titanfall-2'
        ]);

        Game::create([
            'title' => 'Fortnite',
            'thumbnail_url' => 'https://i.pinimg.com/474x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg',
            'url' => 'https://www.epicgames.com/fortnite/es-ES/home'
        ]);

        Game::create([
            'title' => 'Overwatch',
            'thumbnail_url' => 'https://static.wikia.nocookie.net/overwatch/images/c/ca/Overwatch_Portada.jpg/revision/latest?cb=20160523174229&path-prefix=es',
            'url' => 'https://playoverwatch.com/es-es/'
        ]);

        Game::create([
            'title' => 'League of Legends',
            'thumbnail_url' => 'https://as01.epimg.net/meristation/imagenes/2019/08/07/cover/719414081565191040.jpg',
            'url' => 'https://www.leagueoflegends.com/es-es/'
        ]);
    }
}
