<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class testimonial extends Component
{
    /**
     * Create a new component instance.
     */

     public $testimonial;
     public $name;
     Public $designation;
    public function __construct($testimonial, $name, $designation)
    {
        //

        $this->testimonial = $testimonial;
        $this->name = $name;
        $this->designation = $designation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testimonial');
    }
}
