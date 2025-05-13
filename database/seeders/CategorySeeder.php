<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'PUBG',
                'image' => 'https://example.com/images/pubg.png',
                'description' => 'PlayerUnknown’s Battlegrounds (PUBG) is a battle royale game.'
            ],
            [
                'name' => 'Free Fire',
                'image' => 'https://example.com/images/freefire.png',
                'description' => 'Free Fire is a fast-paced battle royale game available on mobile.'
            ],
            [
                'name' => 'Mobile Legends',
                'image' => 'https://example.com/images/mobilelegends.png',
                'description' => 'Mobile Legends: Bang Bang is a multiplayer online battle arena (MOBA) game.'
            ],
            [
                'name' => 'Valorant',
                'image' => 'https://example.com/images/valorant.png',
                'description' => 'Valorant is a free-to-play first-person hero shooter developed by Riot Games.'
            ]
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}