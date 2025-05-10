<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    // Show games list
    public function index()
    {
        $games = Game::with('category')->get();
        return view('admin.game.index', compact('games'));
    }

    // Show create game form
    public function create()
    {
        $categories = Category::all();
        return view('admin.game.create', compact('categories'));
    }

    // Store new game
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $game = new Game();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->category_id = $request->category_id;

        // Upload logo image to Cloudinary
        if ($request->hasFile('logo')) {
            $game->logo = $request->file('logo')->store('game_logos', 'public');
        }

        $game->save();

        return redirect()->route('admin.games.index')->with('success', 'Game added successfully');
    }

    // Show edit game form
    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $categories = Category::all();
        return view('admin.games.edit', compact('game', 'categories'));
    }

    // Update game
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $game = Game::findOrFail($id);
        $game->name = $request->name;
        $game->description = $request->description;
        $game->category_id = $request->category_id;

        // Upload logo image to Cloudinary if provided
        if ($request->hasFile('logo')) {
            $game->logo = $request->file('logo')->store('game_logos', 'public');
        }

        $game->save();

        return redirect()->route('admin.games.index')->with('success', 'Game updated successfully');
    }

    // Delete game
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('admin.games.index')->with('success', 'Game deleted successfully');
    }
}
