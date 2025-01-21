<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\NameType;

class PartyNameType
{
    public function __construct(
        #[SerializedName('Name')]
        public NameType $name
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }
}