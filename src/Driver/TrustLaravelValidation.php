<?php

declare(strict_types=1);

namespace ArtisanBuild\Marketing\Driver;

use ArtisanBuild\Marketing\Contracts\ValidatesEmailAddress;
use ArtisanBuild\Marketing\States\MarketingLeadState;

class TrustLaravelValidation implements ValidatesEmailAddress
{
    public function __invoke(MarketingLeadState $lead): bool
    {
        return true;
    }
}
