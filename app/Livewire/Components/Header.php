<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Header extends Component
{
    public $styles;

    public function render()
    {
        return view('livewire.components.header');
    }
}
