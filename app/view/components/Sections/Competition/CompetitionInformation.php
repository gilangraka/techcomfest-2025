<?php

namespace App\View\Components\Sections\Competition;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompetitionInformation extends Component
{
    public $techStack;
    /**
     * Create a new component instance.
     */
    public function __construct($techStack)
    {
        $this->techStack = $techStack;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sections.competition.competition-information');
    }
}
