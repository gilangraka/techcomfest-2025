<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryItem extends Component
{
    public $categoryItem;
    /**
     * Create a new component instance.
     */
    public function __construct($categoryItem)
    {
        $this->categoryItem = $categoryItem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.category-item');
    }
}
