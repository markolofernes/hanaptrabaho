<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->firstname = $request->firstname;
        $user->midname = $request->midname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->companyname = $request->companyname;
        $user->education = $request->education;
        $user->accounttype = $request->accounttype;
        // $user->status = $request->accounttype;
        $user->save();

        return redirect()->route('home')->with('success', ' Successfully added!');
    }

    public function updateUserStatus(Request $request)
    {
        // dd($request);
        $user = User::find($request->userid);
        $user->status = 'paid';
        // $user->status = $request->input('status');
        $user->save();

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('actions.editprofile')->with('user', $user);
    }
    public function toninterview($id)
    {
        $user = User::find($id);
        return view('actions.sendinterview')->with('user', $user);
    }
    public function tohire($id)
    {
        $user = User::find($id);
        return view('actions.hire')->with('user', $user);
    }
}