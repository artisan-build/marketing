<?php

declare(strict_types=1);

namespace ArtisanBuild\Marketing\Contracts;

use ArtisanBuild\Marketing\States\MarketingLeadState;

interface ValidatesEmailAddress
{
    public function __invoke(MarketingLeadState $lead): bool;
}
