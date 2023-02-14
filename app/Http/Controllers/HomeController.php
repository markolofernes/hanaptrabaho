<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Resume;
use Illuminate\Http\Request;
use App\Models\User;

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
        // dd(JobPost::all());
        return view('home')
            ->with('jobposts', JobPost::orderBy('created_at', 'desc')->get())
            ->with('users', User::all());
        // return view('welcome')->with('jobposts', JobPost::get());
    }

    public function seekerdashboard()
    {
        // dd(Resume::all());
        return view('home')->with('resumes', Resume::all())
            ->with('users', User::all());
        // return view('/home')->with('resume', Resume::find($id));
    }


    // public function viewjobpost($id)
    // {
    //     // $account = JobPost::findOrFail($id);
    //     return view('jobposts')->with('jobposts', JobPost::find($id));
    // }

    public function index()
    {
        // $user = Account::find(1)->user;
        // return view('home', compact('user'));
        // return view('home');
        return view('welcome')
            ->with('jobposts', JobPost::orderBy('created_at', 'desc')->get())
            ->with('users', User::all());
    }

    public function account($id)
    {
        // $account = Account::findOrFail($id);

        // return view('account.index', compact('account'));
        // return view('seeker')->with('account', Account::find($id));
    }

    public function myjobpost($id)
    {
        $jobpost = JobPost::find($id);
        if ($jobpost !== null) {
            return view('jobposts')
                ->with('jobposts', [$jobpost])
                ->with('users', User::all());
        } else {
            return view('home');
        }
    }
    public function viewjob($id)
    {
        $jobpost = JobPost::find($id);
        if ($jobpost !== null) {
            return view('viewjob')
                ->with('jobposts', [$jobpost])
                ->with('users', User::all());
        } else {
            return view('home');
        }
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $jobs = JobPost::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->get();
        return view('welcome', compact('jobs'));
    }
}