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

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $resume = Resume::find($id);

        // if ($twat->image_path != NULL) {
        //     Storage::delete('/public/images/' . $twat->image_path);
        // }

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

        return redirect()->route('updateresume');
    }
    public function edit($id)
    {
        $resume = Resume::find($id);
        return view('createresume')->with('resume', $resume);
    }


}