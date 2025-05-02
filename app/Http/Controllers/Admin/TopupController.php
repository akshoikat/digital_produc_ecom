<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Topup;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topups = Topup::with('game')->latest()->get();
        return view('admin.topups.index', compact('topups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::all();
        return view('admin.topups.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'product_name' => 'required',
            'amount' => 'required',
            'price' => 'required|numeric',
            'delivery_time' => 'required',
        ]);

        Topup::create($request->all());
        return redirect()->route('topups.index')->with('success', 'Top-up product added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
