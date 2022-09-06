<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomeBlog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blog;
    public $blogSections;
    public function __construct($blog, $blogSections)
    {
        $this->blog = $blog;
        $this->blogSections = $blogSections;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-blog');
    }
}
