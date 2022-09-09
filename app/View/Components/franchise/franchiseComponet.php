<?php

namespace App\View\Components\franchise;

use Illuminate\View\Component;

class franchiseComponet extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $franchiseSection;
    public function __construct($franchiseSection)
    {
        $this->franchiseSection = $franchiseSection;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.franchise.franchise-componet');
    }
}
