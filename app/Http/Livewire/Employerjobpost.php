<?php


namespace App\Http\Livewire;

use App\Models\JobPost;
use Livewire\Component;
use Auth;

class Employerjobpost extends Component
{

    public function index()
    {
        // $user = Account::find(1)->user;
        // return view('home', compact('user'));
        // return view('home');
        return view('livewire.employerjobpost')->with('jobposts', JobPost::orderBy('created_at', 'asc')->paginate(12));
    }

    // public $newJobpost;
    // public function mount()
    // {
    //     $this->newJobpost = "test new jobpost";
    // }
    public function render()
    {
        // return view('livewire.counter');
        return view('livewire.employerjobpost')->with('jobposts', JobPost::orderBy('created_at', 'desc')->paginate(12));

    }

    public function deleteId($id)
    {
        $jobpost = JobPost::find($id);

        // if ($twat->image_path != NULL) {
        //     Storage::delete('/public/images/' . $twat->image_path);
        // }

        if (Auth::user()->id == $jobpost->user->id) {
            $jobpost->delete();
            // return redirect()->route('home')->with('success', "Job deleted!");
        } else {
            // return redirect()->route('home');
        }
    }
}