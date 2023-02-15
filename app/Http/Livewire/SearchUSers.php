<?php


namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';

    // public function render()
    // {
    //     if ($this->search == '*') {
    //         return view('livewire.search-users', [
    //             'users' => User::all(),
    //         ]);
    //     } else {

    //         return view('livewire.search-users', [
    //             'users' => User::where('firstname', $this->search)->get(),
    //         ]);
    //     }
    // }

    public function render()
    {

        if ($this->search == '*') {
            return view('livewire.search-users', [
                'users' => User::all(),
            ]);
        } else {
            $searchTerms = explode(' ', $this->search);
            $users = User::query();
            foreach ($searchTerms as $term) {
                $users->where(function ($query) use ($term) {
                    $query->where('firstname', 'like', '%' . $term . '%')
                        ->orWhere('lastname', 'like', '%' . $term . '%')
                        ->orWhere('email', 'like', '%' . $term . '%')
                        ->orWhere('phone', 'like', '%' . $term . '%');
                    // ->orWhere('jobdescription', 'like', '%' . $term . '%');
                });
            }

        }
        return view('livewire.search-users', [
            'users' => $users->get(),
        ]);
    }
}