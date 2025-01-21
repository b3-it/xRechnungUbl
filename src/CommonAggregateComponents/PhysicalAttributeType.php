<?php


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class PhysicalAttributeType
{

    /**
     * @param TextType[] $descriptions
     */
    public function __construct(
        #[SerializedName('AttributeID')]
        protected ?IdentifierType $attributeID = null,
        #[SerializedName('PositionCode')]
        protected ?CodeType $positionCode = null,
        #[SerializedName('DescriptionCode')]
        protected ?CodeType $descriptionCode = null,
        #[SerializedName('Description')]
        protected array $descriptions = []
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

    public function getPositionCode(): ?CodeType
    {
        return $this->positionCode;
    }

    public function setPositionCode(?CodeType $positionCode): void
    {
        $this->positionCode = $positionCode;
    }

    public function getDescriptionCode(): ?CodeType
    {
        return $this->descriptionCode;
    }

    public function setDescriptionCode(?CodeType $descriptionCode): void
    {
        $this->descriptionCode = $descriptionCode;
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
        $this->descriptions = [];
        foreach ($descriptions as $description) {
            $this->addDescription($description);
        }
    }

    public function addDescription(TextType $description): void
    {
        $this->descriptions []= $description;
    }
}