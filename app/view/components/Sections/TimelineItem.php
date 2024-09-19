<?php

namespace App\View\Components\Sections;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TimelineItem extends Component
{
    public $timelineItem;
    /**
     * Create a new component instance.
     */
    public function __construct($timelineItem)
    {
        $this->timelineItem = $timelineItem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.timeline-item');
    }
}
