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
            $jobposts->where(function ($query) use ($term) {
                $query->where('jobtitle', 'like', '%' . $term . '%')
                    ->orWhere('jobtype', 'like', '%' . $term . '%')
                    ->orWhere('joblocation', 'like', '%' . $term . '%')
                    ->orWhere('salary', 'like', '%' . $term . '%');
                // ->orWhere('jobdescription', 'like', '%' . $term . '%');
            });
        }
        return view('livewire.search-jobs', [
            'jobposts' => $jobposts->get(),
        ]);
    }
}