<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
       $categories = Category::select('slug', 'name')->get(); 

        return view('livewire.navigation', compact('categories'));
    }
}
