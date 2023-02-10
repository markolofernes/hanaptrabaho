<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Auth;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('welcome');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $jobpost = new JobPost;
        $jobpost->user_id = $request->user_id;
        $jobpost->jobtitle = $request->jobtitle;
        $jobpost->joblocation = $request->joblocation;
        $jobpost->jobtype = $request->jobtype;
        $jobpost->jobdescription = $request->jobdescription;
        $jobpost->salary = $request->salary;
        $jobpost->save();

        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function show(JobPost $jobPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobpost = JobPost::find($id);
        return view('editjobentry')->with('jobpost', $jobpost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        // dd($request);
        $jobpost = JobPost::find($request->id);

        $jobpost->user_id = $request->user_id;
        $jobpost->jobtitle = $request->jobtitle;
        $jobpost->joblocation = $request->joblocation;
        $jobpost->jobtype = $request->jobtype;
        $jobpost->jobdescription = $request->jobdescription;
        $jobpost->salary = $request->salary;
        $jobpost->save();

        return redirect()->route('home');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPost $jobPost)
    {
        //
    }

    public function delete($id)
    {
        $jobpost = JobPost::find($id);

        // if ($twat->image_path != NULL) {
        //     Storage::delete('/public/images/' . $twat->image_path);
        // }

        if (Auth::user()->id == $jobpost->user->id) {
            $jobpost->delete();
            return redirect()->route('home')->with('success', "Job deleted!");
        } else {
            return redirect()->route('home');
        }
    }
}