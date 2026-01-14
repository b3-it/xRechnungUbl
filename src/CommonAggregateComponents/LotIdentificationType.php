<?php

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use UBL\UnqualifiedDataTypes\IdentifierType;

class LotIdentificationType
{

    /**
     * @param ItemPropertyType[] $additionalItemProperties
     */
    public function __construct(
        #[SerializedName('LotNumberID')]
        protected ?IdentifierType $lotNumberID = null,
        #[SerializedName('ExpiryDate')]
        protected ?DateTimeInterface $expiryDate = null,
        #[Assert\Valid]
        #[SerializedName('AdditionalItemProperty')]
        protected array $additionalItemProperties = []
    )
    {
    }

    public function getLotNumberID(): ?IdentifierType
    {
        return $this->lotNumberID;
    }

    public function setLotNumberID(?IdentifierType $lotNumberID): void
    {
        $this->lotNumberID = $lotNumberID;
    }

    public function getExpiryDate(): ?DateTimeInterface
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(?DateTimeInterface $expiryDate): void
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @return ItemPropertyType[]
     */
    public function getAdditionalItemProperties(): array
    {
        return $this->additionalItemProperties;
    }

    /**
     * @param ItemPropertyType[] $additionalItemProperties
     * @return void
     */
    public function setAdditionalItemProperties(array $additionalItemProperties): void
    {
        $this->additionalItemProperties = [];
        foreach ($additionalItemProperties as $additionalItemProperty) {
            $this->addAdditionalItemProperty($additionalItemProperty);
        }
    }

    public function addAdditionalItemProperty(?ItemPropertyType $additionalItemProperty = null): ItemPropertyType
    {
        return $this->additionalItemProperties []= $additionalItemProperty ?? new ItemPropertyType;
    }
}