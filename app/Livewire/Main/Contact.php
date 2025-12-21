<?php

namespace App\Livewire\Main;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Contact extends Component
{
    #[Layout('layouts.main')]
    #[Title('Contact Us')]

    public function render()
    {
        return view('livewire.main.contact');
    }
}
