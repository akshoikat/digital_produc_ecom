<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MoneyExchange;

class MoneyExchangeController extends Controller
{
    public function index()
    {
        return view('admin.money-exchange.index');
    }

    public function create()
    {
        return view('admin.money-exchange.create');
    }

    public function edit($id)
    {
        return view('admin.money-exchange.edit', compact('id'));
    }
}
