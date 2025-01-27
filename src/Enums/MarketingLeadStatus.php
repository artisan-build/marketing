<?php

namespace ArtisanBuild\Marketing\Enums;

enum MarketingLeadStatus: string
{
    case New = 'new';
    case Confirmed = 'confirmed';
    case Exported = 'exported';
}
