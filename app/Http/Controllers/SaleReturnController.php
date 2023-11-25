<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SaleReturn;
use App\Models\Storage;
use Illuminate\Http\Request;

class SaleReturnController extends Controller
{
    public function index()
    {
        $all = SaleReturn::where('is_remove',0)->get();
        return view('saleReturned.storageRE', compact('all'));
    }

    public function indexRemove()
    {
        $all = SaleReturn::where('is_remove',1)->get();
        return view('saleReturned.storageRE', compact('all'));
    }

    public function indexStorage()
    {
        $all = Storage::all();
        return view('saleReturned.storage', compact('all'));
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
            'is_remove' => $request->is_remove,
            'client_id' => $request->client_id,
        ]);

        $item = Storage::findOrFail($request->item_id);
        if ($request->is_remove == 0) {
            $item->count = $item->count + 1;
            $item->save();
        }
        if($request->client_id){
            $client  = Client::find($request->client_id);
            $client->return_count = $client->return_count + 1;
            $client->save();
        }

        return redirect()->route('home')->with('message','تم ارجاع المنتج بنجاح');
    }
}
