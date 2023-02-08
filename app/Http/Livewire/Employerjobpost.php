<?php


namespace App\Http\Livewire;

use App\Models\JobPost;
use Livewire\Component;

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
}