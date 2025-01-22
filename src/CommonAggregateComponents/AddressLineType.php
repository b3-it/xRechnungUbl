<?php


namespace UBL\CommonAggregateComponents;

use UBL\UnqualifiedDataTypes\TextType;
use Symfony\Component\Serializer\Attribute\SerializedName;

class AddressLineType
{
    public function __construct(
        #[SerializedName('Line')]
        public ?TextType $line = null
    )
    {}
}