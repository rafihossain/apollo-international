<?php

namespace App\View\Components\About;

use Illuminate\View\Component;

class MissionVision extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $aboutVision;
    public function __construct($aboutVision)
    {
        $this->aboutVision = $aboutVision;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.about.mission-vision');
    }
}
