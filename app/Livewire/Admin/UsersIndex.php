<?php

namespace App\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\User;
use Livewire\Component;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $users = User::where('name', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                        ->paginate(15);

        return view('livewire.admin.users-index', compact('users'));
    }
}
