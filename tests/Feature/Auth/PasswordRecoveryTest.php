<?php

use App\Livewire\Auth\Password\Recovery;
use App\Models\User;
use App\Notifications\PasswordRecoveryNotification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;

test('needs to have a route to password recovery', function (){

    $this->get(route('auth.password.recovery'))
        ->assertOk();

});

it('should be able to request for a password recovery', function () {

    Notification::fake();

    $user = User::factory()->create();

    Livewire::test(Recovery::class)
        ->assertDontSee('You will receive an email with the password recovery link.')
        ->set('email', $user->email)
        ->call('startPasswordRecovery')
        ->assertSee('You will receive an email with the password recovery link.');

    Notification::assertSentTo($user, ResetPassword::class);
});

test('making sure the email is a real email', function ($value, $rule) {
    Livewire::test(Recovery::class)
        ->set('email', $value)
        ->call('startPasswordRecovery')
        ->assertHasErrors(['email' => $rule]);
})->with([
    'required' => ['value' => '', 'rule' => 'required'],
    'email' => ['value' => 'any email', 'rule' => 'email']
]);

it('needs to create a token when requesting for a password recovery', function () {

    $user = User::factory()->create();

    Livewire::test(Recovery::class)
        ->set('email', $user->email)
        ->call('startPasswordRecovery');

    $this->assertDatabaseCount('password_reset_tokens', 1);
    $this->assertDatabaseHas('password_reset_tokens', ['email' => $user->email]);
});