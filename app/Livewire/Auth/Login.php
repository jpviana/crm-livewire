<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\{Auth, RateLimiter};
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule(['required'])]
    public string $email;

    #[Rule(['required'])]
    public string $password;

    public function render(): View
    {
        return view('livewire.auth.login')->layout('components.layouts.guest');
    }

    public function login(): void
    {
        $this->validate();

        if (RateLimiter::tooManyAttempts($this->getThrottleKey(), 5)) {
            $this->addError(
                'rateLimiter',
                trans('auth.throttle', [
                    'seconds' => RateLimiter::availableIn($this->getThrottleKey()),
                ])
            );

            return;
        }

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {

            RateLimiter::hit($this->getThrottleKey());

            $this->addError('invalidCredentials', trans('auth.failed'));

            return;
        }

        $this->redirect(route('dashboard'));
    }

    public function getThrottleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}
