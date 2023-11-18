<?php

namespace App\Http\Controllers;

use App\Models\SaleReturn;
use App\Models\Storage;
use Illuminate\Http\Request;

class SaleReturnController extends Controller
{
    public function index()
    {
        $all = SaleReturn::all();
        return view();
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'is_remove' => 'required',
        ]);
        // can send reason it's not required

        SaleReturn::create([
            'item_id' => $request->item_id,
            'reason' => $request->reason,
        ]);

        $item = Storage::findOrFail($request->item_id);
        if ($request->is_remove == false) {
            $item->count = $item->count + 1;
        }
    }
}
