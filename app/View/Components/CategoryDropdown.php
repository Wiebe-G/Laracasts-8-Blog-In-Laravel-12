<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class CategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.category-dropdown', [
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
}
