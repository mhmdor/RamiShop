<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $all = Client::all();
        return view('Client.index',compact('all'));
    }


    public function getStore(Request $request)
    {
        
        return view('Client.add');
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
        return redirect()->route('home')->with('message','تم الحفظ بنجاح');
    }

    public function edit($id)
    {
        $Client = Client::findOrFail($id);
        return view('Client.edit',compact('Client'));
    }

    public function update(Request $request)
    {
        $Client = Client::findOrFail($request->id);
        $Client->update([
            'name' => $request->name,
            'phone'=> $request->phone,
        ]);
        return redirect()->route('home')->with('message','تم التعديل بنجاح');
    }

    
}
