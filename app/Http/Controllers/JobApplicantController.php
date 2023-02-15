<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use App\Models\JobPost;
use App\Models\JobSave;
use App\Models\Resume;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobApplicantController extends Controller
{
    public function index($id)
    {
        if (Auth::User()->id == $id) {

            $jobapplicants = JobApplicant::where('applicant_id', $id)->get();
            $jobapplicnts = JobApplicant::all();
            $jobposts = JobPost::all();
            $resumes = Resume::all();
            $users = User::all();
            return view('applied')
                ->with('jobposts', $jobposts)
                ->with('jobapplicants', $jobapplicants)
                ->with('users', $users)
                ->with('jobapplicnts', $jobapplicnts)
                ->with('resumes', $resumes);
        } else {
            return redirect()->route('home');
        }

    }

    public function create(Request $request)
    {
        $exists = DB::table('jobapplicants')
            ->where('jobpost_id', $request->jobpost_id)
            ->where('applicant_id', $request->applicant_id)
            ->exists();

        $message = 'Thanks for applying on this job!';
        if ($exists) {
            $message = 'You already applied for this job, please wait for an interview schedule';
        } else {
            $jobapplicant = new JobApplicant;
            $jobapplicant->jobpost_id = $request->jobpost_id;
            $jobapplicant->applicant_id = $request->applicant_id;
            $jobapplicant->save();
        }

        return redirect()->route('blank')->with('message', $message);
    }

}