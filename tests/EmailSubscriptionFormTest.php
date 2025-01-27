<?php

use ArtisanBuild\Marketing\Livewire\EmailSubscriptionFormComponent;
use ArtisanBuild\Marketing\States\MarketingLeadState;
use Livewire\Livewire;
use Thunk\Verbs\Models\VerbSnapshot;

it('adds a valid email address', function (): void {
    $email = fake()->email();
    expect(VerbSnapshot::query()->where('type', MarketingLeadState::class)
        ->where('data->data->email', $email)->count())
        ->toBe(0);
    Livewire::test(EmailSubscriptionFormComponent::class)
        ->assertSee('Subscribe')
        ->assertSet('subscribed', false)
        ->set('email', $email)
        ->call('subscribe')
        ->assertSuccessful()
        ->assertDontSee('Subscribe')
        ->assertSet('subscribed', true)
        ->assertSee('All set! We will be in touch soon!');

    expect(VerbSnapshot::query()->where('type', MarketingLeadState::class)
        ->where('data->data->email', $email)->count())
        ->toBe(1);
});

it('only adds a valid email address once', function (): void {
    $email = fake()->email();
    expect(VerbSnapshot::query()->where('type', MarketingLeadState::class)
        ->where('data->data->email', $email)->count())
        ->toBe(0);
    Livewire::test(EmailSubscriptionFormComponent::class)
        ->assertSee('Subscribe')
        ->assertSet('subscribed', false)
        ->set('email', $email)
        ->call('subscribe')
        ->assertSuccessful()
        ->assertDontSee('Subscribe')
        ->assertSet('subscribed', true)
        ->assertSee('All set! We will be in touch soon!');

    Livewire::test(EmailSubscriptionFormComponent::class)
        ->assertSee('Subscribe')
        ->assertSet('subscribed', false)
        ->set('email', $email)
        ->call('subscribe')
        ->assertSuccessful()
        ->assertDontSee('Subscribe')
        ->assertSet('subscribed', true)
        ->assertSee('All set! We will be in touch soon!');

    expect(VerbSnapshot::query()->where('type', MarketingLeadState::class)
        ->where('data->data->email', $email)->count())
        ->toBe(1);
});
