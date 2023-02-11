<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use Auth;

class ResumeController extends Controller
{
    public function index(){
        return view('home')->with('resumes', Resume::latest()->get());
    }

    public function create(Request $request)
    {
        // dd($request);
        $resume = new Resume;
        $resume->user_id = $request->user_id;
        $resume->fullname = $request->fullname;
        $resume->phone = $request->phone;
        $resume->address = $request->address;
        $resume->email = $request->email;
        $resume->textarea = $request->textarea;
        $resume->skills = $request->skills;
        $resume->language = $request->language;
        $resume->save();

        return redirect()->route('SeekDashboard');
    }

    public function delete($id)
    {
        $resume = Resume::find($id);

        if (Auth::user()->id == $resume->user->id) {
            $resume->delete();
            return redirect()->route('home')->with('success', "Resume deleted!");
        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request)
    {
        // dd($request);
        $resume = Resume::find($request->id);

        $resume->user_id = $request->user_id;
        $resume->fullname = $request->fullname;
        $resume->phone = $request->phone;
        $resume->address = $request->address;
        $resume->email = $request->email;
        $resume->textarea = $request->textarea;
        $resume->skills = $request->skills;
        $resume->language = $request->language;

        $resume->save();

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $resume = Resume::find($id);
        return view('actions.editresume')->with('resume', $resume);
    }


}
