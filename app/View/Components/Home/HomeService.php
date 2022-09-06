<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomeService extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $service;
    public $serviceSections;
    public function __construct($service, $serviceSections)
    {
        $this->service = $service;
        $this->serviceSections = $serviceSections;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-service');
    }
}
