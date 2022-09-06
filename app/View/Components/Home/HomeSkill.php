<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomeSkill extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $skill;
    public function __construct($skill)
    {
        $this->skill = $skill;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-skill');
    }
}
