<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomeTestimonial extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $testimonial;
    public $testimonials;
    public function __construct($testimonial, $testimonials)
    {
        $this->testimonial = $testimonial;
        $this->testimonials = $testimonials;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-testimonial');
    }
}
