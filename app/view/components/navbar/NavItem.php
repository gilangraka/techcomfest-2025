<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavItem extends Component
{
    public $navItem;
    /**
     * Create a new component instance.
     */
    public function __construct($navItem)
    {
        $this->navItem = $navItem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.nav-item');
    }
}
