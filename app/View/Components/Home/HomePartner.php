<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomePartner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $partners;
    public function __construct($partners)
    {
        $this->partners = $partners;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-partner');
    }
}
