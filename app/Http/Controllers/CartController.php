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
        $all = Storage::all();
        $cart = Cart::where('is_active', true)->first();
        if (!$cart) {
            $cart = Cart::create([]);
        }
        //must compact $cart and $cart->items;
        return view('cart.storage',compact('all','cart'));
    }

    public function indexCart()
    {
       
       
        $cart = Cart::where('is_active', true)->first();

       
       
        //must compact $cart and $cart->items;
        return view('cart.cart',compact('cart'));
    }



    public function store(Request $request)
    {
        
        $request->validate([
            'item_id' => 'required',
            'count' => 'required',
            'cart_id' =>'required',
        ]);
        $item = Storage::find($request->item_id);
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
        $cart->save();
        foreach ($cart->items as $item) {
            $storage = Storage::find($item->item_id);
            $storage->count = $storage->count - $item->count;
            $storage->save();
        }
        return redirect()->route('home')->with('message', 'تمت العملية بنجاح');
    }
}
