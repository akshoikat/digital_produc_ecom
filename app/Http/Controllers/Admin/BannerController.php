<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }


    public function store(Request $request){
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cta_button_text' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $banner = new Banner();
        $banner->hero_title = $request->input('hero_title');
        $banner->hero_subtitle = $request->input('hero_subtitle');
        $banner->featured_plan_id = $request->input('featured_plan_id');
        $banner->cta_button_text = $request->input('cta_button_text');
        $banner->price = $request->input('price');

        if ($request->hasFile('hero_image')) {
            $imagePath = $request->file('hero_image')->store('images', 'public');
            $banner->hero_image = '/storage/' . $imagePath;
        }

        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }
    
}
