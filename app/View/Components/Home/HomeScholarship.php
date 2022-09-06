<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomeScholarship extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $scholarship;
    public function __construct($scholarship)
    {
        $this->scholarship = $scholarship;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-scholarship');
    }
}
