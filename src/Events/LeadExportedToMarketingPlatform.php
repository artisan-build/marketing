<?php

namespace ArtisanBuild\Marketing\Events;

use ArtisanBuild\Marketing\Contracts\ValidatesEmailAddress;
use ArtisanBuild\Marketing\States\MarketingLeadState;
use Thunk\Verbs\Attributes\Autodiscovery\StateId;
use Thunk\Verbs\Event;

class LeadExportedToMarketingPlatform extends Event
{
    #[StateId(MarketingLeadState::class)]
    public int $marketing_lead_id;

    public function validate(): bool
    {
        if (! $this->state(MarketingLeadState::class) instanceof MarketingLeadState) {
            return false;
        }

        return app(ValidatesEmailAddress::class)($this->state(MarketingLeadState::class));
    }
}
