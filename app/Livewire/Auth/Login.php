<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Layout('layouts.auth')]
    #[Title('Login')]

    public $email_address = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'email_address' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email_address' => $this->email_address, 'password' => $this->password])) {
            session()->flash('message', 'Login successful!');
            return redirect()->route('dashboard');
        }

        session()->flash('message', 'Invalid credentials, please try again.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
