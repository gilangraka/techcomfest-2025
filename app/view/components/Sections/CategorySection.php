<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategorySection extends Component
{
    public $categoryItems;
    /**
     * Create a new component instance.
     */
    public function __construct($categoryItems)
    {
        $this->categoryItems = $categoryItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.category-section');
    }
}
