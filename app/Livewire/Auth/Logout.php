<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Logout extends Component
{
    public function render(): string
    {
        return <<<BLADE
            <div><x-button icon="o-power" class="btn-circle btn-ghost btn-xs" wire:click="logout"></x-button></div>
        BLADE;
    }

    #[On('logout')]
    public function logout(): void
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->redirect(route('auth.login'));
    }
}
