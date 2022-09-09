<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HomeFaq extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $faq;
    public $faqs;
    
    public function __construct($faq, $faqs)
    {
        $this->faq = $faq;
        $this->faqs = $faqs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.home-faq');
    }
}
