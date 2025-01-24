<?php

namespace ArtisanBuild\Marketing\Providers;

use Illuminate\Support\ServiceProvider;

class MarketingServiceProvider extends ServiceProvider
{
    #[\Override]
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/marketing.php', 'marketing');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/marketing.php' => config_path('marketing.php'),
        ], 'marketing');
    }
}
