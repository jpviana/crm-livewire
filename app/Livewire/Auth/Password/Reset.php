<?php

namespace App\Livewire\Auth\Password;

use Illuminate\Support\Facades\{DB, Hash};
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Reset extends Component
{
    public ?string $token = null;

    #[Rule(['required', 'email', 'confirmed'])]
    public ?string $email = null;

    public ?string $email_confirmation = null;

    #[Rule(['required', 'confirmed'])]
    public ?string $password = null;

    public ?string $password_confirmation = null;

    public function mount(?string $token = null, ?string $email = null): void
    {
        $this->token = request('token', $token);
        $this->email = request('email', $email);

        if ($this->tokenNotValid()) {

            session()->flash('status', 'Token Invalid');

            $this->redirectRoute('auth.login');
        }
    }
    public function render(): View
    {
        return view('livewire.auth.password.reset');
    }

    private function tokenNotValid(): bool
    {
        $tokens = DB::table('password_reset_tokens')
            ->get(['token']);

        foreach ($tokens as $t) {
            if (Hash::check($this->token, $t->token)) {
                return false;
            }
        }

        return true;
    }
}
