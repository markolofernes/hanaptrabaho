<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seeker;

class SeekerController extends Controller
{
    public function create(Request $request){
        $seeker = new Seeker;
        $seeker->name = $request->name;
        $seeker->phone = $request->phone;
        $seeker->address = $request->address;
        $seeker->education = $request->education;
        $seeker->save();

        return redirect()->route('seek');
    }
}
