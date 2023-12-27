<?php

use App\Livewire\Auth\Logout;
use App\Models\User;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;

it('be able should log out', function () {
    $user = User::factory()->create();
    actingAs($user);

    Livewire::test(Logout::class)
        ->call('logout')
        ->assertRedirect(route('auth.login'));

    expect(auth()->guest())->toBeTrue()
        ->and(auth()->check())->toBeFalse();
});
