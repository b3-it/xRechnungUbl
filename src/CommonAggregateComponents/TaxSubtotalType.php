<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\NumericType;
use UBL\UnqualifiedDataTypes\PercentType;
use UBL\UnqualifiedDataTypes\TextType;

class TaxSubtotalType
{
    public function __construct(
        #[SerializedName('TaxableAmount')]
        protected ?AmountType $taxableAmount = null,
        #[SerializedName('TaxAmount')]
        protected ?AmountType $taxAmount = null,
        #[SerializedName('CalculationSequenceNumeric')]
        protected ?NumericType $calculationSequenceNumeric = null,
        #[SerializedName('TransactionCurrencyTaxAmount')]
        protected ?AmountType $transactionCurrencyTaxAmount = null,
        #[SerializedName('Percent')]
        protected ?PercentType $percent = null,
        #[SerializedName('BaseUnitMeasure')]
        protected ?MeasureType $baseUnitMeasure = null,
        #[SerializedName('PerUnitAmount')]
        protected ?AmountType $perUnitAmount = null,
        #[SerializedName('TierRange')]
        protected ?TextType $tierRange = null,
        #[SerializedName('TierRatePercent')]
        protected ?PercentType $tierRatePercent = null,
        #[SerializedName('TaxCategory')]
        protected ?TaxCategoryType $taxCategory = null
    )
    {
#        $this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getTaxableAmount(): ?AmountType
    {
        return $this->taxableAmount;
    }

    public function setTaxableAmount(?AmountType $taxableAmount): void
    {
        $this->taxableAmount = $taxableAmount;
    }

    public function getTaxAmount(): ?AmountType
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(?AmountType $taxAmount): void
    {
        $this->taxAmount = $taxAmount;
    }

    public function getCalculationSequenceNumeric(): ?NumericType
    {
        return $this->calculationSequenceNumeric;
    }

    public function setCalculationSequenceNumeric(?NumericType $calculationSequenceNumeric): void
    {
        $this->calculationSequenceNumeric = $calculationSequenceNumeric;
    }

    public function getTransactionCurrencyTaxAmount(): ?AmountType
    {
        return $this->transactionCurrencyTaxAmount;
    }

    public function setTransactionCurrencyTaxAmount(?AmountType $transactionCurrencyTaxAmount): void
    {
        $this->transactionCurrencyTaxAmount = $transactionCurrencyTaxAmount;
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



    public function getTaxCategory(): ?TaxCategoryType
    {
        if ($this->taxCategory == null) {
            $this->taxCategory = new TaxCategoryType();
        }
        return $this->taxCategory;
    }

    public function setTaxCategory(?TaxCategoryType $taxCategory): void
    {
        $this->taxCategory = $taxCategory;
    }
}