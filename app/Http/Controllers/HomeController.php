<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = Account::find(1)->user;
        // return view('home', compact('user'));
        return view('home');
    }

    public function account($id)
    {
        // $account = Account::findOrFail($id);

        // return view('account.index', compact('account'));
        // return view('seeker')->with('account', Account::find($id));
    }
}