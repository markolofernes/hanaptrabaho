<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Employer;

class EmployerController extends Controller
{
    public function createEmployer(Request $request)
    {
        $employer = new Employer;
        $employer->name = $request->name;
        $employer->phone = $request->phone;
        $employer->address = $request->address;
        $employer->education = $request->education;
        $employer->save();

        return redirect()->route('employer');
    }
}