<?php

namespace App\View\Components\About;

use Illuminate\View\Component;

class DirectorMessages extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $directorMessage;
    public function __construct($directorMessage)
    {
        $this->directorMessage = $directorMessage;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.about.director-messages');
    }
}
