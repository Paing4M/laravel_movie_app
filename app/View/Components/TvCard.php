<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TvCard extends Component {
    public $tv;

    public function __construct($tv) {
        $this->tv = $tv;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.tv-card');
    }
}
