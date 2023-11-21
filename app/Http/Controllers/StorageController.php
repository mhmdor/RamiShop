<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index()
    {
        $all = Storage::all();
        return view('storage.storage', compact('all'));
    }

    public function add()
    {
        $all = Storage::all();
        return view('storage.add',compact('all'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'count' => 'required',
        ]);

        Storage::create([
            'name' => $request->name,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'count' => $request->count,
        ]);
        return redirect()->route('home')->with('message', 'تمت اضافة المنتج بنجاح');
    }

    public function edit(Request $request)
    {
        $item = Storage::findOrFail($request->id);
        return view('storage.edit',compact('item'));
    }

    public function update(Request $request)
    {
        $item = Storage::findOrFail($request->id);
        $item->update([
            'name' => $request->name,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'count' => $request->count,
        ]);
        return redirect()->route('home')->with('message', 'تم تعديل المنتج بنجاح');
    }

    public function delete(Request $request)
    {
        $item = Storage::findOrFail($request->id);
        $item->delete();
        return redirect()->back()->with('message', 'تم حذف المنتج');
    }

}
