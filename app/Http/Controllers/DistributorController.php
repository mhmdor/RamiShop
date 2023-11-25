<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $all = Distributor::all();
        return view();
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
        return redirect()->back()->with('message','تم الحفظ بنجاح');
    }

    public function edit(Request $request)
    {
        $distributor = Distributor::findOrFail($request->id);
        return view();
    }

    public function update(Request $request)
    {
        $distributor = Distributor::findOrFail($request->id);
        $distributor->update([
            'name' => $request->name,
            'phone'=> $request->phone,
        ]);
        return redirect()->back()->with('message','تم التعديل بنجاح');
    }
}
