<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $all = Distributor::all();
        return view('distributor.index',compact('all'));
    }


    public function getStore(Request $request)
    {
        
        return view('distributor.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
        ]);
        Distributor::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
        ]);
        return redirect()->route('home')->with('message','تم الحفظ بنجاح');
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributor.edit',compact('distributor'));
    }

    public function update(Request $request)
    {
        $distributor = Distributor::findOrFail($request->id);
        $distributor->update([
            'name' => $request->name,
            'phone'=> $request->phone,
        ]);
        return redirect()->route('home')->with('message','تم التعديل بنجاح');
    }
}
