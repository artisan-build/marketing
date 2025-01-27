<?php

namespace ArtisanBuild\Marketing\Livewire;

use ArtisanBuild\Marketing\Events\MarketingLeadCreated;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Thunk\Verbs\Exceptions\EventNotValidForCurrentState;

class EmailSubscriptionFormComponent extends Component
{
    #[Validate('required|email:rfc,dns,spoof')]
    public ?string $email = null;

    public bool $subscribed = false;

    public array $view_data;

    public function mount(
        ?string $heading = null,
        ?string $subheading = null,
        ?string $icon = null,
        string $subscribe = 'Subscribe',
        string $subscribed_message = 'All set! We will be in touch soon!',
    ): void {
        $this->view_data = compact('heading', 'subheading', 'icon', 'subscribe', 'subscribed_message');
    }

    public function subscribe(): void
    {
        $data = $this->validate();

        try {
            MarketingLeadCreated::fire(
                email: $data['email'],
                data: $data,
            );

        } catch (EventNotValidForCurrentState) {
            // If someone is already subscribed, just let it fall through to the success message
        } catch (Exception $e) {
            throw ($e);
        }

        $this->subscribed = true;
    }

    public function render(): Factory|Application|\Illuminate\Contracts\View\View|View|null
    {
        return view('marketing::livewire.email-subscription-form')->with($this->view_data);
    }
}
