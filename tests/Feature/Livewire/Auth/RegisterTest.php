<?php

use App\Livewire\Auth\Register;
use Livewire\Livewire;

use function Pest\Laravel\{assertDatabaseCount, assertDatabaseHas};

it('renders successfully', function () {
    Livewire::test(Register::class)
        ->assertStatus(200);
});

it('should me able to register a new user', function () {
    Livewire::test(Register::class)
        ->set('name', 'Joe Doe')
        ->set('email', 'joe@doe.com')
        ->set('email_confirmation', 'joe@doe.com')
        ->set('password', 'password')
        ->call('submit')->assertHasNoErrors();

    assertDatabaseHas('users', [
        'name'  => 'Joe Doe',
        'email' => 'joe@doe.com',
    ]);

    assertDatabaseCount('users', 1);
});

test('validation rules', function ($object) {
    Livewire::test(Register::class)
        ->set($object->field, $object->value)
        ->call('submit')
        ->assertHasErrors([$object->field => $object->rule]);

})->with([
    'name::required'     => (object) ['field' => 'name', 'value' => '', 'rule' => 'required'],
    'name::max'          => (object) ['field' => 'name', 'value' => str_repeat('*', 256), 'rule' => 'max'],
    'email::required'    => (object) ['field' => 'email', 'value' => '', 'rule' => 'required'],
    'email::email'       => (object) ['field' => 'email', 'value' => 'lala', 'rule' => 'email'],
    'password::required' => (object) ['field' => 'password', 'value' => '', 'rule' => 'required'],
]);
