<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\Account;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function employerdashboard()
    {
        return view('home')->with('jobposts', JobPost::orderBy('created_at', 'desc')->paginate(6));
        // return view('welcome')->with('jobposts', JobPost::get());
    }

    // public function empdashboard()
    // {
    //     // $user = Account::find(1)->user;
    //     // return view('home', compact('user'));
    //     // return view('home');
    //     return view('home')->with('jobposts', JobPost::orderBy('created_at', 'desc')->paginate(6));

    //     // return view('welcome')->with('jobposts', JobPost::get());


    // }
    public function viewjobpost($id)
    {

        $account = JobPost::findOrFail($id);


        return view('jobposts')->with('jobposts', JobPost::find($id));
    }

    public function index()
    {
        // $user = Account::find(1)->user;
        // return view('home', compact('user'));
        // return view('home');
        return view('welcome')->with('jobposts', JobPost::orderBy('created_at', 'desc')->paginate(12));
    }

    public function account($id)
    {
        // $account = Account::findOrFail($id);

        // return view('account.index', compact('account'));
        // return view('seeker')->with('account', Account::find($id));
    }
}