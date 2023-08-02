<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TypesCurso extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $type
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $color = 'blue';
        $color = $this->type === 'Online' ? 'green' : $color;
        $textType = getTypesCurso($this->type);
        return view('components.types-curso', compact('textType', 'color'));
    }
}
