<?php

namespace ArtisanBuild\Marketing\Driver;

use ArtisanBuild\Marketing\Contracts\ExportsLeadToMarketingPlatform;
use ArtisanBuild\Marketing\Exceptions\NoDriverInstalledException;
use ArtisanBuild\Marketing\States\MarketingLeadState;

class LeaveMarketingLeadPending implements ExportsLeadToMarketingPlatform
{
    /**
     * @throws NoDriverInstalledException
     */
    public function __invoke(MarketingLeadState $lead): void
    {
        throw new NoDriverInstalledException('Leaving the marketing lead pending until a driver is installed');
    }
}
