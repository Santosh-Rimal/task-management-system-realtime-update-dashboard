<?php

namespace App\View\Components\customecomponent;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class delete extends Component
{
    /**
     * Create a new component instance.
     */
    public $name,$delete;
    public function __construct(string $name, string $delete)
    {
        $this->name = $name;
        $this->delete = $delete;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customecomponent.deletemessage');
    }
}