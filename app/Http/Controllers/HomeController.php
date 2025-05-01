<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Feature;
use App\Models\Game;


class HomeController extends Controller
{
    public function index()
    {
        
        $banners = Banner::all();
        $features = Feature::all();
        $games = Game::all();
        return view('web.home',compact('banners','features','games'));
    }
}
