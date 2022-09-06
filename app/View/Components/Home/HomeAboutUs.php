<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomeAboutUs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $homeAboutUs;
    public function __construct($homeAboutUs)
    {
        $this->homeAboutUs = $homeAboutUs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-about-us');
    }
}
