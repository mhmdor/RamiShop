<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Cart;
use App\Models\SaleReturn;
use App\Models\Storage;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
    {
        $gain = 0;//اجمالي الربح
        $gain2 = 0; //الربح الصافي
        $carts = Cart::all();
        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                $gain = $gain + $item->price;
                $gain2 = $gain2 + $item->price - $item->item->buy_price;
            }
        }

        $loss = 0;
        $saleReturn = SaleReturn::all();
        foreach ($saleReturn as $sale) {
            $gain = $gain - $sale->item->sell_price;
            if ($sale->is_remove) {
                $loss = $loss + $sale->item->buy_price;
            }
        }

        $max_product = Storage::orderBy('number_buy', 'desc')->take(10)->get();

        $min_product = Storage::orderBy('number_buy', 'asc')->take(10)->get();

        $near_finish = Storage::where('count', '<', 6)->get();
        $is_remove = SaleReturn::all();

        $cost = 3;
        $number_of_sell = Buy::count();
        $number_of_buy = Cart::count();
        $number_of_returned = SaleReturn::count();
    }
}
