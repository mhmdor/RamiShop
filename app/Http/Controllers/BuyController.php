<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Buy;
use App\Models\DistributorDebt;
use App\Models\Storage;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
        $all = Buy::all();
        return view('buy.index', compact('all'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'count' => 'required',
            'distributor_id' => 'required',
        ]);
        Buy::create([
            'distributor_id' => $request->distributor_id,
            'item_name' => $request->item_name,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'count' => $request->count,
            'description'=> $request->description,
        ]);

        $box = Box::first();
        if (!$box) {
            $box = Box::create([]);
        }
        $box->update([
            'amount' => $box->amount - $request->count * $request->buy_price
        ]);

        $item = Storage::where('name', $request->item_name)->first();
        if ($item) {
            $item->update([
                'buy_price' => $request->buy_price,
                'sell_price' => $request->sell_price,
                'count' => $item->count + $request->count,
                'distributor_id' => $request->distributor_id,
            ]);
        } else {
            Storage::create([
                'name' => $request->item_name,
                'buy_price' => $request->buy_price,
                'sell_price' => $request->sell_price,
                'count' => $request->count,
                'distributor_id' => $request->distributor_id,
            ]);
        }

        if ($request->amount) {

            $debt = DistributorDebt::where('distributor_id', $request->distributor_id)->first();
            if ($debt) {
                $debt->update([
                    'remain' => $debt->remain + $request->amount,
                ]);
            } else {
                $debt = DistributorDebt::create([
                    'distributor_id' => $request->distributor_id,
                    'remain' => $request->amount,
                ]);
            }
        }

        return redirect()->route('home')->with('message', 'تمت العملية بنجاح');
    }
}
