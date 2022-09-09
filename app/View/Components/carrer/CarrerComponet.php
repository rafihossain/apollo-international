<?php

namespace App\View\Components\carrer;

use Illuminate\View\Component;

class CarrerComponet extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $carrerSection;
    public function __construct($carrerSection)
    {
        $this->carrerSection = $carrerSection;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carrer.carrer-componet');
    }
}
