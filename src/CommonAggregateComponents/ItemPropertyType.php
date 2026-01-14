<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;
use UBL\UnqualifiedDataTypes\ValueType;

class ItemPropertyType
{
    /**
     * @param TextType[] $valueQualifiers
     * @param TextType[] $listValues
     * @param ItemPropertyGroupType[] $itemPropertyGroups
     */
    public function __construct(
        #[SerializedName("ID")]
        protected ?IdentifierType $id = null,
        #[Assert\NotNull(message: '[BR-54]-Each Item attribute (BG-32) shall contain an Item attribute name (BT-160) and an Item attribute value (BT-161).')]
        #[SerializedName("Name")]
        protected ?NameType $name = null,
        #[SerializedName("NameCode")]
        protected ?CodeType $nameCode = null,
        #[SerializedName("TestMethod")]
        protected ?TextType $testMethod = null,
        #[Assert\NotNull(message: '[BR-54]-Each Item attribute (BG-32) shall contain an Item attribute name (BT-160) and an Item attribute value (BT-161).')]
        #[SerializedName("Value")]
        protected ?ValueType $value = null,
        #[SerializedName("ValueQuantity")]
        protected ?QuantityType $valueQuantity = null,
        #[SerializedName("ValueQualifier")]
        protected array $valueQualifiers = [],
        #[SerializedName("ImportanceCode")]
        protected ?CodeType $importanceCode = null,
        #[SerializedName("ListValue")]
        protected array $listValues = [],
        #[SerializedName("UsabilityPeriod")]
        protected ?PeriodType $usabilityPeriod = null,
        #[SerializedName("ItemPropertyGroup")]
        protected array $itemPropertyGroups = [],
        #[SerializedName("RangeDimension")]
        protected ?DimensionType $rangeDimension = null,
        #[SerializedName("ItemPropertyRange")]
        protected ?ItemPropertyRangeType $itemPropertyRange = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?NameType
    {
        return $this->name;
    }

    public function setName(?NameType $name): void
    {
        $this->name = $name;
    }

    public function getNameCode(): ?CodeType
    {
        return $this->nameCode;
    }

    public function setNameCode(?CodeType $nameCode): void
    {
        $this->nameCode = $nameCode;
    }

    public function getTestMethod(): ?TextType
    {
        return $this->testMethod;
    }

    public function setTestMethod(?TextType $testMethod): void
    {
        $this->testMethod = $testMethod;
    }

    public function getValue(): ?ValueType
    {
        return $this->value;
    }

    public function setValue(?ValueType $value): void
    {
        $this->value = $value;
    }

    public function getValueQuantity(): ?QuantityType
    {
        return $this->valueQuantity;
    }

    public function setValueQuantity(?QuantityType $valueQuantity): void
    {
        $this->valueQuantity = $valueQuantity;
    }

    /**
     * @return TextType[]
     */
    public function getValueQualifiers(): array
    {
        return $this->valueQualifiers;
    }

    /**
     * @param TextType[] $valueQualifiers
     * @return void
     */
    public function setValueQualifiers(array $valueQualifiers): void
    {
        $this->valueQualifiers = [];
        foreach ($valueQualifiers as $valueQualifier) {
            $this->addValueQualifier($valueQualifier);
        }
    }

    public function addValueQualifier(?TextType $valueQualifier = null): TextType
    {
        return $this->valueQualifiers []= $valueQualifier ?? new TextType;
    }

    public function getImportanceCode(): ?CodeType
    {
        return $this->importanceCode;
    }

    public function setImportanceCode(?CodeType $importanceCode): void
    {
        $this->importanceCode = $importanceCode;
    }

    /**
     * @return TextType[]
     */
    public function getListValues(): array
    {
        return $this->listValues;
    }

    /**
     * @param TextType[] $listValues
     * @return void
     */
    public function setListValues(array $listValues): void
    {
        $this->listValues = [];
        foreach ($listValues as $listValue) {
            $this->addListValue($listValue);
        }
    }
    public function addListValue(?TextType $listValue = null): TextType
    {
        return $this->listValues []= $listValue ?? new TextType;
    }

    public function getUsabilityPeriod(): ?PeriodType
    {
        return $this->usabilityPeriod;
    }

    public function setUsabilityPeriod(?PeriodType $usabilityPeriod): void
    {
        $this->usabilityPeriod = $usabilityPeriod;
    }

    /**
     * @return ItemPropertyGroupType[]
     */
    public function getItemPropertyGroups(): array
    {
        return $this->itemPropertyGroups;
    }

    /**
     * @param ItemPropertyGroupType[] $itemPropertyGroups
     * @return void
     */
    public function setItemPropertyGroups(array $itemPropertyGroups): void
    {
        $this->itemPropertyGroups = [];
        foreach ($itemPropertyGroups as $itemPropertyGroup) {
            $this->addItemPropertyGroup($itemPropertyGroup);
        }
    }

    public function addItemPropertyGroup(?ItemPropertyGroupType $itemPropertyGroup = null): ItemPropertyGroupType
    {
        return $this->itemPropertyGroups []= $itemPropertyGroup ?? new ItemPropertyGroupType;
    }

    public function getRangeDimension(): ?DimensionType
    {
        return $this->rangeDimension;
    }

    public function setRangeDimension(?DimensionType $rangeDimension): void
    {
        $this->rangeDimension = $rangeDimension;
    }

    public function getItemPropertyRange(): ?ItemPropertyRangeType
    {
        return $this->itemPropertyRange;
    }

    public function setItemPropertyRange(?ItemPropertyRangeType $itemPropertyRange): void
    {
        $this->itemPropertyRange = $itemPropertyRange;
    }


}