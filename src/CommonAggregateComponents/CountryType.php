<?php


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\NameType;

class CountryType
{
    public function __construct(
        #[SerializedName('IdentificationCode')]
        protected ?CodeType $identificationCode = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null
    )
    {
    }

    public function getIdentificationCode(): ?CodeType
    {
        return $this->identificationCode;
    }

    public function setIdentificationCode(?CodeType $identificationCode): void
    {
        $this->identificationCode = $identificationCode;
    }

    public function getName(): ?NameType
    {
        return $this->name;
    }

    public function setName(?NameType $name): void
    {
        $this->name = $name;
    }
}