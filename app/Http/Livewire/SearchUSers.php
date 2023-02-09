<?php


namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';

    public function render()
    {
        if ($this->search == '*') {
            return view('livewire.search-users', [
                'users' => User::all(),
            ]);
        } else {

            return view('livewire.search-users', [
                'users' => User::where('firstname', $this->search)->get(),
            ]);
        }
    }
}