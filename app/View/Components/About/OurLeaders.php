<?php

namespace App\View\Components\About;

use Illuminate\View\Component;

class OurLeaders extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $teamSections;
    public $team;
    public function __construct($teamSections, $team)
    {
        $this->teamSections = $teamSections;
        $this->team = $team;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.about.our-leaders');
    }
}
