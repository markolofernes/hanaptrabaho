<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use App\Models\JobPost;
use App\Models\JobSave;
// use App\Models\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobApplicantController extends Controller
{
    // public function index($id)
    // {
    //     // $jobsaves = JobPost::find($id)->jobsaves;

    //     // $jobsaves = JobSave::all('applicant_id');
    //     $jobsaves = JobSave::where('applicant_id', $id)->get();
    //     $jobsavs = JobSave::all();
    //     $jobposts = JobPost::all();
    //     $users = User::all();
    //     // dd($jobposts, $jobsaves);
    //     return view('savejobs')
    //         ->with('jobposts', $jobposts)
    //         ->with('jobsaves', $jobsaves)
    //         ->with('users', $users)
    //         ->with('jobsavs', $jobsavs);
    // }
    public function create(Request $request)
    {
        $exists = DB::table('jobapplicants')->where('jobpost_id', $request->jobpost_id)->exists();
        $message = 'Thanks for applying on this job!';
        if ($exists) {
            $message = 'You already Applied for this job, pls. wait for an interview schedule';
        } else {
            $jobapplicant = new JobApplicant;
            $jobapplicant->jobpost_id = $request->jobpost_id;
            $jobapplicant->applicant_id = $request->applicant_id;

            $jobapplicant->save();
        }
        return redirect()->route('blank')->with('message', $message);
    }
}