<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Game;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.game.index', compact('games'));
    }

    public function create()
    {
       
        return view('admin.game.create');
    }

    public function store(Request $request){
        $data = $request->validate([

            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'full_description' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // assuming file upload
            'regular_price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'sale_price' => 'nullable|numeric|min:0',
            'catagory_id' => 'required|exists:catagorys,id',
        ]);
        dd($data);
        if ($request->hasFile('image_path')) {
            // dd($request->file('image'));
            $image = $request->file('image_path');
            $uploadedFile = Cloudinary::uploadApi()->upload($image->getRealPath());
            $data['image_path'] = $uploadedFile['secure_url'];
        }
        
        Game::create($data);



        return redirect()->back()->with('success', 'Banner created successfully.');


    }
}
