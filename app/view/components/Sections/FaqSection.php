<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FaqSection extends Component
{
    public $faqItems;
    /**
     * Create a new component instance.
     */
    public function __construct($faqItems)
    {
        $this->faqItems = $faqItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.faq-section');
    }
}
