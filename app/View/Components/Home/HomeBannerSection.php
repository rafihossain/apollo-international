<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomeBannerSection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bannerlist;
    public function __construct($bannerlist)
    {
        $this->bannerlist = $bannerlist;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-banner-section');
    }
}
