<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use Auth;

class ResumeController extends Controller
{
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
}