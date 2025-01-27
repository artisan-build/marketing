<?php

namespace ArtisanBuild\Marketing\Contracts;

use ArtisanBuild\Marketing\Exceptions\NoDriverInstalledException;
use ArtisanBuild\Marketing\States\MarketingLeadState;

interface ExportsLeadToMarketingPlatform
{
    /**
     * @throws NoDriverInstalledException
     */
    public function __invoke(MarketingLeadState $lead): void;
}
