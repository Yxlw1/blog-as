<?php

namespace App\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\Post;
use Livewire\Component;

class PostsIndex extends Component
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

        $posts = Post::where('user_id', auth()->user()->id)->where('name', 'LIKE', '%'.$this->search.'%')->latest('id')->paginate(6);

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
