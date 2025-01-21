<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\TextType;

class DimensionType
{

    /**
     * @param TextType[] $descriptions
     */
    public function __construct(
        #[SerializedName('AttributeID')]
        protected ?IdentifierType $attributeID = null,
        #[SerializedName('Measure')]
        protected ?MeasureType $measure = null,
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('MinimumMeasure')]
        protected ?MeasureType $minimumMeasure = null,
        #[SerializedName('MaximumMeasure')]
        protected ?MeasureType $maximumMeasure = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
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
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = [];
        foreach ($descriptions as $description) {
            $this->addDescription($description);
        }
    }

    public function addDescription(TextType $description): self
    {
        $this->descriptions []= $description;
        return $this;
    }

    public function getMinimumMeasure(): ?MeasureType
    {
        return $this->minimumMeasure;
    }

    public function setMinimumMeasure(?MeasureType $minimumMeasure): void
    {
        $this->minimumMeasure = $minimumMeasure;
    }

    public function getMaximumMeasure(): ?MeasureType
    {
        return $this->maximumMeasure;
    }

    public function setMaximumMeasure(?MeasureType $maximumMeasure): void
    {
        $this->maximumMeasure = $maximumMeasure;
    }
}