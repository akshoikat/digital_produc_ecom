<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $games = [
            [
                'name' => 'PUBG Mobile',
                'logo' => 'https://example.com/logos/pubg.png',
                'description' => 'PUBG Mobile is a popular battle royale game.',
                'category_id' => 1,
            ],
            [
                'name' => 'Free Fire',
                'logo' => 'https://example.com/logos/freefire.png',
                'description' => 'Free Fire is a survival shooter game available on mobile.',
                'category_id' => 2,
            ],
            [
                'name' => 'Mobile Legends',
                'logo' => 'https://example.com/logos/mlbb.png',
                'description' => 'Mobile Legends is a 5v5 MOBA game.',
                'category_id' => 3,
            ],
            [
                'name' => 'Valorant',
                'logo' => 'https://example.com/logos/valorant.png',
                'description' => 'Valorant is a tactical shooter by Riot Games.',
                'category_id' => 4,
            ],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
       
    }
}

