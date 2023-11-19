<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Storage;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
        $all = Buy::all();
        return view();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'item_name' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'count' => 'required',
        ]);
        Buy::create([
            'name' => $request->name,
            'item_name' => $request->item_name,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'count' => $request->count,
        ]);
        $item = Storage::where('name', $request->item_name)->first();
        if ($item) {
            $item->update([
                'buy_price' => $request->buy_price,
                'sell_price' => $request->sell_price,
                'count' => $item->count + $request->count,
            ]);
        }
        return redirect()->route('home')->with('message', 'تمت العملية بنجاح');
    }
    
}
