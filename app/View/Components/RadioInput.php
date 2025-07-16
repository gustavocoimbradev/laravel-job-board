<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $value = null,
        public ?string $name = null,
        public ?string $label = null,
        public ?string $checked = null
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-input');
    }
}
