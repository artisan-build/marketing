<?php

namespace ArtisanBuild\Marketing\Events;

use ArtisanBuild\Marketing\Contracts\ExportsLeadToMarketingPlatform;
use ArtisanBuild\Marketing\Exceptions\NoDriverInstalledException;
use ArtisanBuild\Marketing\States\MarketingLeadState;
use Exception;
use Thunk\Verbs\Attributes\Autodiscovery\StateId;
use Thunk\Verbs\Event;
use Thunk\Verbs\Models\VerbSnapshot;

class MarketingLeadCreated extends Event
{
    #[StateId(MarketingLeadState::class)]
    public ?int $marketing_lead_id = null;

    public string $email;

    public array $data;

    public function validate(MarketingLeadState $state): bool
    {
        return VerbSnapshot::query()
            ->where('type', MarketingLeadState::class)
            ->where('data->data->email', $this->email)
            ->doesntExist();
    }

    public function apply(MarketingLeadState $lead): void
    {
        $lead->data = $this->data;
    }

    /**
     * @throws Exception
     */
    public function handle(MarketingLeadState $lead): void
    {
        try {
            app(ExportsLeadToMarketingPlatform::class)($lead);
        } catch (NoDriverInstalledException) {
            // This exception is expected if no driver is installed, so we ignore it.
        } catch (Exception $e) {
            throw ($e);
        }
    }
}
