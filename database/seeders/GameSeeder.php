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
        $pubg = Category::where('name', 'PUBG')->first();

        Game::updateOrCreate(
            ['name' => 'PUBG Mobile'],
            [
                'category_id' => $pubg->id,
                'description' => 'Top-up your PUBG UC',
                'logo' => 'https://via.placeholder.com/100'
            ]
        );
    }
}

