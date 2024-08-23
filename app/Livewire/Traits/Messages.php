<?php

namespace App\Livewire\Traits;

use Livewire\Attributes\On;

trait Messages {
    public $message;
    public $status;

    public function setMessage($message, $status)
    {
        $this->message = $message;
        $this->status = $status;
        $this->dispatch('set_message', $message, $status);
    }

    #[On('clear_messages')]
    public function clear_messages()
    {
        $this->message = null;
        $this->status = null;
    }
}