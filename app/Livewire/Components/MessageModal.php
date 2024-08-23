<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class MessageModal extends Component
{
    public $message;
    public $status;

    public function render()
    {
        return view('livewire.components.message-modal');
    }
}
