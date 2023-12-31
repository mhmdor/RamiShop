<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Cart;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        $box = Box::first();
        if (!$box) {
            $box = Box::create([]);
        }
        return view('box',compact('box'));
    }

    public function updateBox(Request $request)
    {
        $request->validate([
            'is_add' => 'required',
            'amount' => 'required',
        ]);
        $box = Box::first();
        if ($request->is_add == 1) {
            $cart = Cart::create([
                'is_active' => false, 
                'name'=> $request->name,
                'price'=> $request->amount,
            ]);
            
            $box->update([
                'amount' => $box->amount + $request->amount,
            ]);
        } else {
            $box->update([
                'amount' => $box->amount - $request->amount,
            ]);
        }
        return redirect()->back()->with('message','تم التعديل بنجاح');
    }
}
