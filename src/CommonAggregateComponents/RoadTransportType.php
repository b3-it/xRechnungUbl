<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;

class RoadTransportType
{
    public function __construct(
        #[SerializedName('LicensePlateID')]
        public IdentifierType $licensePlateID
    )
    {
    }
}