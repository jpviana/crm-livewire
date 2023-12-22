<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Register extends Component
{
    #[Rule(['required', 'max:255'])]
    public ?string $name = null;

    #[Rule(['required', 'email'])]
    public ?string $email;

    public ?string $email_confirmation;

    #[Rule(['required'])]
    public ?string $password;

    public function render(): View
    {
        return view('livewire.auth.register');
    }

    public function submit(): void
    {
        $this->validate();

        $user = User::query()->create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => $this->password,
        ]);

        auth()->login($user);
    }
}
