<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\TextType;

class TemperatureType
{
    /***
     * @param TextType[] $descriptions
     */
    public function __construct(
        #[SerializedName('AttributeID')]
        protected ?IdentifierType $attributeID = null,
        #[SerializedName('Measure')]
        protected ?MeasureType $measure = null,
        #[SerializedName('Description')]
        protected array $descriptions = []
    )
    {
    }

    public function getAttributeID(): ?IdentifierType
    {
        return $this->attributeID;
    }

    public function setAttributeID(?IdentifierType $attributeID): void
    {
        $this->attributeID = $attributeID;
    }

    public function getMeasure(): ?MeasureType
    {
        return $this->measure;
    }

    public function setMeasure(?MeasureType $measure): void
    {
        $this->measure = $measure;
    }

    /**
     * @return TextType[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param TextType[] $descriptions
     * @return void
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = $descriptions;
    }

    public function addDescription(TextType $description): void
    {
        $this->descriptions []= $description;
    }
}