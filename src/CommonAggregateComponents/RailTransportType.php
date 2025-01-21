<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;

class RailTransportType
{
    public function __construct(
        #[SerializedName('TrainID')]
        public IdentifierType $trainId,
        #[SerializedName('RailCarID')]
        public ?IdentifierType $railCarID = null
    )
    {
    }
}