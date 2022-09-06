<?php

namespace App\View\Components\About;

use Illuminate\View\Component;

class AboutCompany extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $aboutCompany;
    public function __construct($aboutCompany)
    {
        $this->aboutCompany = $aboutCompany;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.about.about-company');
    }
}
