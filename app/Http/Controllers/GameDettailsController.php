<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Game;
use Illuminate\Http\Request;

class GameDettailsController extends Controller
{


    public function categoryGames($id)
    {
        $features = Feature::all();
        $category = Category::with('games.products')->findOrFail($id);
        return view('web.page.dettails', compact('category','features'));
    }

    public function gameProducts($id)
    {
        $game = Game::with('products')->findOrFail($id);
        return view('frontend.game-products', compact('game'));
    }

}
