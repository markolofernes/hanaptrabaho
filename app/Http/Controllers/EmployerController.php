<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function createEmployer(Request $request){
        $seeker = new Employer;
        $seeker->name = $request->name;
        $seeker->phone = $request->phone;
        $seeker->address = $request->address;
        $seeker->education = $request->education;
        $seeker->save();

        return redirect()->route('employer');
    }
}
