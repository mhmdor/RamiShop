<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index()
    {
        $all = Storage::all();
        return view();
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Storage::create([
            'name' => $request->name,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'count' => $request->count,
        ]);
        return redirect()->back()->with('message', 'add successfully');
    }

    public function edit()
    {
        return view();
    }

    public function update(Request $request)
    {
        $item = Storage::findOrFail($request->id);
        $item->update($request->all());
        return redirect()->back()->with('message', 'update successfully');
    }

    public function delete(Request $request)
    {
        $item = Storage::findOrFail($request->id);
        $item->delete();
        return redirect()->back()->with('message', 'delete successfully');
    }

}
