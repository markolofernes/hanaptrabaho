<?php


namespace App\Http\Livewire;

use App\Models\JobPost;
use App\Models\User;
use Livewire\Component;

class SearchJobs extends Component
{
    public $search = '';

    public function render()
    {
        if ($this->search == '*') {
            return view('livewire.search-jobs', [
                'jobposts' => JobPost::all(),
            ]);
        } else {

            return view('livewire.search-jobs', [
                'jobposts' => JobPost::where('jobtitle', $this->search)->get(),
            ]);
        }
    }
}