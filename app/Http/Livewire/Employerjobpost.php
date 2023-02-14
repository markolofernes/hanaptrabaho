<?php


namespace App\Http\Livewire;

use App\Models\JobPost;
use App\Models\User;
use Livewire\Component;
use Auth;

class Employerjobpost extends Component
{

    public function index()
    {
        return view('livewire.employerjobpost')
            ->with('jobposts', JobPost::orderBy('created_at', 'asc')->get())
            ->with('jobposts', User::all());
    }

    public function render()
    {
        return view('livewire.employerjobpost')
            ->with('jobposts', JobPost::orderBy('created_at', 'asc')->get())
            ->with('jobposts', User::all());

    }

    public function deleteId($id)
    {
        $jobpost = JobPost::find($id);

        if (Auth::user()->id == $jobpost->user->id) {
            $jobpost->delete();
        }
    }
}