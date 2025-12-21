<?php

namespace App\Livewire\Main;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Homepage extends Component
{
    #[Layout('layouts.main')]
    #[Title('Courier Service - Your Trusted Delivery Partner')]

    public function render()
    {
        return view('livewire.main.homepage');
    }
}
