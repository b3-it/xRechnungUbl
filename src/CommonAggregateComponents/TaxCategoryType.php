<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\PercentType;
use UBL\UnqualifiedDataTypes\TextType;

class TaxCategoryType
{


    /**
     * @param TextType[] $taxExemptionReasons
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('Percent')]
        protected ?PercentType $percent = null,
        #[SerializedName('BaseUnitMeasure')]
        protected ?MeasureType $baseUnitMeasure = null,
        #[SerializedName('PerUnitAmount')]
        protected ?AmountType $perUnitAmount = null,
        #[SerializedName('TaxExemptionReasonCode')]
        protected ?CodeType $taxExemptionReasonCode = null,
        #[SerializedName('TaxExemptionReason')]
        protected array $taxExemptionReasons = [],
        #[SerializedName('TierRange')]
        protected ?TextType $tierRange = null,
        #[SerializedName('TierRatePercent')]
        protected ?PercentType $tierRatePercent = null,
        #[SerializedName('TaxScheme')]
        protected ?TaxSchemeType $taxScheme = null)
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

    public function getPercent(): ?PercentType
    {
        return $this->percent;
    }

    public function setPercent(?PercentType $percent): void
    {
        $this->percent = $percent;
    }

    public function getBaseUnitMeasure(): ?MeasureType
    {
        return $this->baseUnitMeasure;
    }

    public function setBaseUnitMeasure(?MeasureType $baseUnitMeasure): void
    {
        $this->baseUnitMeasure = $baseUnitMeasure;
    }

    public function getPerUnitAmount(): ?AmountType
    {
        return $this->perUnitAmount;
    }

    public function setPerUnitAmount(?AmountType $perUnitAmount): void
    {
        $this->perUnitAmount = $perUnitAmount;
    }

    public function getTaxExemptionReasonCode(): ?CodeType
    {
        return $this->taxExemptionReasonCode;
    }

    public function setTaxExemptionReasonCode(?CodeType $taxExemptionReasonCode): void
    {
        $this->taxExemptionReasonCode = $taxExemptionReasonCode;
    }

    public function getTierRange(): ?TextType
    {
        return $this->tierRange;
    }

    public function setTierRange(?TextType $tierRange): void
    {
        $this->tierRange = $tierRange;
    }

    public function getTierRatePercent(): ?PercentType
    {
        return $this->tierRatePercent;
    }

    public function setTierRatePercent(?PercentType $tierRatePercent): void
    {
        $this->tierRatePercent = $tierRatePercent;
    }



    /**
     * @return TextType[]
     */
    public function getTaxExemptionReasons(): array
    {
        return $this->taxExemptionReasons;
    }

    /**
     * @param TextType[] $taxExemptionReasons
     */
    public function setTaxExemptionReasons(array $taxExemptionReasons): void
    {
        $this->taxExemptionReasons = [];
        foreach ($taxExemptionReasons as $taxExemptionReason) {
            $this->addTaxExemptionReason($taxExemptionReason);
        }
    }
    public function addTaxExemptionReason(TextType $taxExemptionReason): void
    {
        $this->taxExemptionReasons []= $taxExemptionReason;
    }

    public function getTaxScheme(): ?TaxSchemeType
    {
        if ($this->taxScheme == null) {
            $this->taxScheme = new TaxSchemeType();
        }
        return $this->taxScheme;
    }

    public function setTaxScheme(?TaxSchemeType $taxScheme): void
    {
        $this->taxScheme = $taxScheme;
    }
}