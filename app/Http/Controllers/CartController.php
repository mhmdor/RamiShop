<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Storage;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('is_active', true)->first();
        if (!$cart) {
            $cart = Cart::create([]);
        }
        //must compact $cart and $cart->items;
        return view();
    }



    public function store(Request $request)
    {
        $request->validate([
            'item_id' => $request->item_id,
            'count' => $request->count,
            'cart_id' => $request->cart_id,
        ]);
        $item = Storage::find($request->item_id);
        $cart_item = CartItem::create([
            'cart_id' => $request->cart_id,
            'count' => $request->count,
            'item_id' => $request->item_id,
            'price' => $item->sell_price
        ]);
        return redirect()->back()->with('message', 'add successfully');
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
        return redirect()->back()->with('message', 'delete successfully');
    }

    public function deleteCart(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $cartItem = CartItem::where('cart_id', $cart->id)->delete();
        $cart->delete();
        return redirect()->back()->with('message', 'تم الحذف بنجاح');
    }

    public function confirmCart(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $cart->is_active = false;
        $cart->save();
        foreach ($cart->items as $item) {
            $storage = Storage::find($item->storage_id);
            $storage->count = $storage->count - $item->count;
            $storage->save();
        }
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
}
