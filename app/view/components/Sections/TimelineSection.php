<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TimelineSection extends Component
{
    public $timelineItems;
    /**
     * Create a new component instance.
     */
    public function __construct($timelineItems)
    {
        $this->timelineItems = $timelineItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.timeline-section');
    }
}
