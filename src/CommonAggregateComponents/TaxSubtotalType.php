<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\NumericType;
use UBL\UnqualifiedDataTypes\PercentType;
use UBL\UnqualifiedDataTypes\TextType;

class TaxSubtotalType
{
    public function __construct(
        #[Assert\NotNull(message: '[BR-45]-Each VAT breakdown (BG-23) shall have a VAT category taxable amount (BT-116).')]
        #[SerializedName('TaxableAmount')]
        protected ?AmountType $taxableAmount = null,
        #[Assert\NotNull(message: '[BR-46]-Each VAT breakdown (BG-23) shall have a VAT category tax amount (BT-117).')]
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
        #[Assert\When("value?.getTaxScheme()?.getId()?.value == 'VAT'", [
            new Assert\Expression('value.getId()', '[BR-47]-Each VAT breakdown (BG-23) shall be defined through a VAT category code (BT-118).')
        ])]
        #[SerializedName('TaxCategory')]
        protected ?TaxCategoryType $taxCategory = null
    )
    {
        $this->taxCategory ??= new TaxCategoryType();
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
        return $this->taxCategory;
    }

    public function setTaxCategory(?TaxCategoryType $taxCategory): void
    {
        $this->taxCategory = $taxCategory;
    }

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
        if ($taxCat = $this->getTaxCategory()) {
            $context->getValidator()->inContext($context)->validate($taxCat->getTaxExemptionReasons(), [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-32]-VAT exemption reason text shall occur maximum once')
            ]);
        }
    }
}