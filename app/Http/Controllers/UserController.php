<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $all = User::all();
        return view();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->back()->with('message', 'تمت الاضافة بنجاح');

    }
}
