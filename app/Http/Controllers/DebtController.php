<?php

namespace App\Http\Controllers;

use App\Models\ClientDebt;
use App\Models\DistributorDebt;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    public function getClientDebt()
    {
        $all = ClientDebt::all();
        return view();
    }

    public function addClientDebt(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'amount' => 'required',
        ]);
        $debt = ClientDebt::where('client_id', $request->client_id)->first();
        if ($debt) {
            return redirect()->back()->with('error', 'المستخدم مسجل مسبقا');
        }
        $debt = ClientDebt::create([
            'client_id' => $request->client_id,
            'amount' => $request->amount,
        ]);
        return redirect()->back()->with('message', 'تمت الاضافة بنجاح');
    }

    public function updateClientDebt(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'amount' => 'required',
            'is_add' => 'required',
        ]);
        $debt = ClientDebt::where('client_id', $request->client_id)->first();
        if ($request->is_add == 1) {
            $debt->update([
                'amount' =>  $debt->amount + $request->amount,
            ]);
        } else {
            $debt->update([
                'amount' =>  $debt->amount - $request->amount,
            ]);
        }
        return redirect()->back()->with('message', 'تمت التعديل بنجاح');
    }




    public function getDistributorDebt()
    {
        $all = DistributorDebt::all();
        return view();
    }

    public function addDistributorDebt(Request $request)
    {
        $request->validate([
            'distributor_id' => 'required',
            'amount' => 'required',
        ]);
        $debt = DistributorDebt::where('distributor_id', $request->distributor_id)->first();
        if ($debt) {
            return redirect()->back()->with('error', 'المستخدم مسجل مسبقا');
        }
        $debt = DistributorDebt::create([
            'distributor_id' => $request->distributor_id,
            'amount' => $request->amount,
        ]);
        return redirect()->back()->with('message', 'تمت الاضافة بنجاح');
    }

    public function updateDistributorDebt(Request $request)
    {
        $request->validate([
            'distributor_id' => 'required',
            'amount' => 'required',
            'is_add' => 'required',
        ]);
        $debt = DistributorDebt::where('distributor_id', $request->distributor_id)->first();
        if ($request->is_add == 1) {
            $debt->update([
                'amount' =>  $debt->amount + $request->amount,
            ]);
        } else {
            $debt->update([
                'amount' =>  $debt->amount - $request->amount,
            ]);
        }
        return redirect()->back()->with('message', 'تمت التعديل بنجاح');
    }
}
