<?php


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\NameType;

class CountryType
{
    public function __construct(
        #[SerializedName('IdentificationCode')]
        public ?CodeType $identificationCode = null,
        #[SerializedName('Name')]
        public ?NameType $name = null
    )
    {
    }
}