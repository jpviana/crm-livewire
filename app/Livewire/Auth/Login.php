<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{
    public string $email;

    public string $password;
    public function render(): View
    {
        return view('livewire.auth.login')->layout('components.layouts.guest');
        ;
    }

    public function login(): void
    {
        if(!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->addError('invalidCredentials', 'Email or Password are wrong!');
        }

        $this->redirect(route('dashboard'));
    }
}
