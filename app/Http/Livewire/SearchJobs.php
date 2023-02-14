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
        $searchTerms = explode(' ', $this->search);
        $jobposts = JobPost::query();
        foreach ($searchTerms as $term) {
            $jobposts->where('jobtitle', 'like', '%' . $term . '%');
        }
        return view('livewire.search-jobs', [
            'jobposts' => $jobposts->get(),
        ]);
    }

}