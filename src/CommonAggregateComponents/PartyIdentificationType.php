<?php


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;

class PartyIdentificationType
{
    public function __construct(
        #[SerializedName('ID')]
        public IdentifierType $id
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);

    }

    public function getId(): IdentifierType
    {
        return $this->id;
    }

    public function setId(IdentifierType $id): void
    {
        $this->id = $id;
    }
}