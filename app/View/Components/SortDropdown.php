<?php

namespace App\View\Components;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use PhpParser\Node\Expr\Closure;

class SortDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sort-dropdown');
    }
}
