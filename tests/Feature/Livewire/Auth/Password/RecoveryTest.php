<?php

use App\Livewire\Auth\Password\Recovery;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Recovery::class)
        ->assertStatus(200);
});

it('should be able recovery a password', function () {
    $user = User::factory()->create();

    Livewire::test(Recovery::class)
        ->set('email', $user->email)
        ->call('recovery')
        ->assertOk();
});
