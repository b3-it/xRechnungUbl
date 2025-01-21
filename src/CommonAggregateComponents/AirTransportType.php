<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;

class AirTransportType
{
    public function __construct(
        #[SerializedName("AircraftID")]
        public ?IdentifierType $aircraftID
    )
    {
    }
}