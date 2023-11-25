<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $all = Client::all();
        return view();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
        ]);
        Client::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
        ]);
        return redirect()->back()->with('message','تم الحفظ بنجاح');
    }

    public function edit(Request $request)
    {
        $client = Client::findOrFail($request->id);
        return view();
    }

    public function update(Request $request)
    {
        $client = Client::findOrFail($request->id);
        $client->update([
            'name' => $request->name,
            'phone'=> $request->phone,
        ]);
        return redirect()->back()->with('message','تم التعديل بنجاح');
    }

    
}
