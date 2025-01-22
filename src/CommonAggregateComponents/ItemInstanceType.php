<?php

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\IdentifierType;

class ItemInstanceType
{
    /**
     * @param ItemPropertyType[] $additionalItemProperties
     */
    public function __construct(
        #[SerializedName('ProductTraceID')]
        protected ?IdentifierType $productTraceID = null,
        #[SerializedName('ManufactureDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $manufactureDate = null,
        #[SerializedName('ManufactureTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $manufactureTime = null,
        #[SerializedName('BestBeforeDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $bestBeforeDate = null,
        #[SerializedName('RegistrationID')]
        protected ?IdentifierType $registrationID = null,
        #[SerializedName('SerialID')]
        protected ?IdentifierType $serialID = null,
        #[SerializedName('AdditionalItemProperty')]
        protected array $additionalItemProperties = [],
        #[SerializedName('LotIdentification')]
        protected ?LotIdentificationType $lotIdentification = null
    )
    {
    }

    public function getProductTraceID(): ?IdentifierType
    {
        return $this->productTraceID;
    }

    public function setProductTraceID(?IdentifierType $productTraceID): void
    {
        $this->productTraceID = $productTraceID;
    }

    public function getManufactureDate(): ?DateTimeInterface
    {
        return $this->manufactureDate;
    }

    public function setManufactureDate(?DateTimeInterface $manufactureDate): void
    {
        $this->manufactureDate = $manufactureDate;
    }

    public function getManufactureTime(): ?DateTimeInterface
    {
        return $this->manufactureTime;
    }

    public function setManufactureTime(?DateTimeInterface $manufactureTime): void
    {
        $this->manufactureTime = $manufactureTime;
    }

    public function getBestBeforeDate(): ?DateTimeInterface
    {
        return $this->bestBeforeDate;
    }

    public function setBestBeforeDate(?DateTimeInterface $bestBeforeDate): void
    {
        $this->bestBeforeDate = $bestBeforeDate;
    }

    public function getRegistrationID(): ?IdentifierType
    {
        return $this->registrationID;
    }

    public function setRegistrationID(?IdentifierType $registrationID): void
    {
        $this->registrationID = $registrationID;
    }

    public function getSerialID(): ?IdentifierType
    {
        return $this->serialID;
    }

    public function setSerialID(?IdentifierType $serialID): void
    {
        $this->serialID = $serialID;
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

    public function getLotIdentification(): ?LotIdentificationType
    {
        return $this->lotIdentification;
    }

    public function setLotIdentification(?LotIdentificationType $lotIdentification): void
    {
        $this->lotIdentification = $lotIdentification;
    }
}