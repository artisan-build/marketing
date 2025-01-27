<?php

namespace ArtisanBuild\Marketing\Providers;

use ArtisanBuild\Marketing\Contracts\ExportsLeadToMarketingPlatform;
use ArtisanBuild\Marketing\Contracts\ValidatesEmailAddress;
use ArtisanBuild\Marketing\Driver\LeaveMarketingLeadPending;
use ArtisanBuild\Marketing\Driver\TrustLaravelValidation;
use ArtisanBuild\Marketing\Livewire\EmailSubscriptionFormComponent;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Override;

class MarketingServiceProvider extends ServiceProvider
{
    #[Override]
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/marketing.php', 'marketing');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'marketing');

        // Unless a CRM driver has been set up, we just store the lead's state for later export
        $this->app->bindIf(ExportsLeadToMarketingPlatform::class, LeaveMarketingLeadPending::class);

        // By default, we will trust the Laravel validation of emails, but a different class can be bound here to dig deeper
        $this->app->bindIf(ValidatesEmailAddress::class, TrustLaravelValidation::class);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/marketing.php' => config_path('marketing.php'),
        ], 'marketing');

        Livewire::component('marketing:email-subscription-form', EmailSubscriptionFormComponent::class);
    }
}
