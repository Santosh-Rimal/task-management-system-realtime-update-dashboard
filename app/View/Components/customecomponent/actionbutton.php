<?php

namespace App\View\Components\customecomponent;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class actionbutton extends Component
{
    /**
     * Create a new component instance.
     */

     public $id, $variant, $class, $action, $button;
    public function __construct(string $id, string $variant = 'primary', string $class = 'blue', string $action , string $button = 'Action')
    {
        $this->id = $id;
        $this->variant = $variant;
        $this->class = $class;
        $this->action = $action;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customecomponent.actionbutton');
    }
}