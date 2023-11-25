<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Client;
use App\Models\Storage;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $all = Storage::all();
        $cart = Cart::where('is_active', true)->first();
        if (!$cart) {
            $cart = Cart::create([]);
        }
        //must compact $cart and $cart->items;
        return view('cart.storage', compact('all', 'cart'));
    }

    public function indexCart()
    {


        $cart = Cart::where('is_active', true)->first();



        //must compact $cart and $cart->items;
        return view('cart.cart', compact('cart'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'item_id' => 'required',
            'count' => 'required',
            'cart_id' => 'required',
        ]);
        $item = Storage::find($request->item_id);
        if ($item->count < $request->count) {
            return redirect()->back()->with('error', 'لايوجد عدد كافي');
        }
        $cart_item = CartItem::create([
            'cart_id' => $request->cart_id,
            'count' => $request->count,
            'item_id' => $request->item_id,
            'price' => $item->sell_price
        ]);
        return redirect()->back()->with('message', 'تمت الاضافة للسلة');
    }

    public function editCount(Request $request)
    {
        $item = CartItem::findOrFail($request->id);
        $item->count = $request->count;
        $item->save();
        return redirect()->back()->with('message', 'update successfully');
    }

    public function deleteItem(Request $request)
    {
        $item = CartItem::findOrFail($request->id);
        $item->delete();
        return redirect()->back()->with('message', 'تم الحذف من السلة');
    }

    public function deleteCart(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $cartItem = CartItem::where('cart_id', $cart->id)->delete();
        $cart->delete();
        return redirect()->route('home')->with('message', 'تم الحذف بنجاح');
    }

    public function confirmCart(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $cart->is_active = false;
        $cart->client_id = $request->client_id;
        $cart->save();
        $gain = 0;
        foreach ($cart->items as $item) {
            $storage = Storage::find($item->item_id);
            $storage->count = $storage->count - $item->count;
            $storage->number_buy = $storage->number_buy + 1;
            $storage->save();
            $gain = $gain + $item->price * $item->count;
        }
        $box = Box::first();
        if (!$box) {
            $box = Box::create([]);
        }
        $box->update([
            'amount' => $box->amount + $gain
        ]);
        if ($request->client_id) {
            $client  = Client::find($request->client_id);
            $client->buy_count = $client->buy_count + 1;
            $client->save();
        }
        return redirect()->route('home')->with('message', 'تمت العملية بنجاح');
    }
}
