<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\JobSave;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobSaveController extends Controller
{
    public function index($id)
    {
        $jobsaves = JobSave::where('applicant_id', $id)->get();
        $jobsavs = JobSave::all();
        $jobposts = JobPost::all();
        $users = User::all();
        return view('savejobs')
            ->with('jobposts', $jobposts)
            ->with('jobsaves', $jobsaves)
            ->with('users', $users)
            ->with('jobsavs', $jobsavs);
    }

    public function create(Request $request)
    {

        $exists = DB::table('jobsaves')->where('jobpost_id', $request->jobpost_id)->exists();
        $message = 'Saved successfully!';
        if ($exists) {
            $message = 'This Job entry was already saved';
        } else {
            $jobsaves = new JobSave;
            $jobsaves->jobpost_id = $request->jobpost_id;
            $jobsaves->applicant_id = $request->applicant_id;

            $jobsaves->save();
        }

        return redirect()->route('blank')->with('message', $message);
    }


    public function delete($id)
    {
        $jobsaves = JobSave::find($id);
        $jobsaves->delete();
        return redirect()->route('home')->with('success', "save job deleted!");
    }
// public function delete($id)
// {
//     $jobsaves = JobSave::where('id', $id)->first();

//     if ($jobsaves != null) {
//         $jobsaves->delete();
//         return redirect()->route('showsavejobs')->with(['message' => 'Successfully deleted!!']);
//     }

//     return redirect()->route('showsavejobs')->with(['message' => 'Wrong ID!!']);
// }
}