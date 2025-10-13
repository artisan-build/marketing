<?php

declare(strict_types=1);

namespace ArtisanBuild\Marketing\Enums;

enum MarketingLeadStatus: string
{
    case New = 'new';
    case Confirmed = 'confirmed';
    case Exported = 'exported';
}
