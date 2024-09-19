<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FaqItem extends Component
{
    public $faqItem;
    /**
     * Create a new component instance.
     */
    public function __construct($faqItem)
    {
        $this->faqItem = $faqItem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.faq-item');
    }
}
