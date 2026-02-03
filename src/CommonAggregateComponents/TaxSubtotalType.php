<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use UBL\Peppol\TaxCategoryCode;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\NumericType;
use UBL\UnqualifiedDataTypes\PercentType;
use UBL\UnqualifiedDataTypes\TextType;

class TaxSubtotalType
{
    public function __construct(
        #[Assert\NotNull(message: 'BR-45')]
        #[SerializedName('TaxableAmount')]
        protected ?AmountType $taxableAmount = null,
        #[Assert\NotNull(message: 'BR-46')]
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
        #[Assert\Valid]
        #[Assert\Callback([self::class, 'validateTaxCategory'])]
        #[Assert\When("value?.getTaxScheme()?.getId()?.value == 'VAT'", [
            new Assert\Expression('value.getId()', 'BR-47'),
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
        $taxContext = $context->getvalidator()->inContext($context)->atPath('taxAmount');
        if ($taxCat = $this->getTaxCategory()) {
            switch (TaxCategoryCode::tryFrom($taxCat->getId()->value)) {
                case TaxCategoryCode::E:
                    $taxContext->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-E-09')
                    ]);
                    break;
                case TaxCategoryCode::S:
                    $this->checkTaxAmount($context, 'BR-S-09');
                    break;
                case TaxCategoryCode::Z:
                    $taxContext->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-Z-09')
                    ]);
                    break;
                case TaxCategoryCode::AE:
                    $taxContext->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-AE-09')
                    ]);
                    break;
                case TaxCategoryCode::G:
                    $taxContext->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-G-09')
                    ]);
                    break;
                case TaxCategoryCode::O:
                    $taxContext->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-O-09')
                    ]);
                    break;
                case TaxCategoryCode::K:
                    $taxContext->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-IC-09')
                    ]);
                    break;
                case TaxCategoryCode::L:
                    $this->checkTaxAmount($context, 'BR-AF-09');
                    break;
                case TaxCategoryCode::M:
                    $this->checkTaxAmount($context, 'BR-AG-09');
                    break;
                default:
                    break;
            }
        }
    }

    protected function checkTaxAmount(ExecutionContextInterface $context, string $rule): void
    {
        if ($this->taxAmount?->value == null || $this->taxableAmount?->value == null || $this->taxCategory->getPercent()?->value == null) {
            return;
        }
        $calcTax = round(abs($this->taxableAmount->value) * $this->taxCategory->getPercent()->value / 100, 2);
        if (abs($this->taxAmount->value) - 1 < $calcTax && abs($this->taxAmount->value) + 1 > $calcTax) {
            return;
        }
        $context->buildViolation($rule)->atPath('taxAmount')->addViolation();
    }

    public static function validateTaxCategory(TaxCategoryType $taxCategory, ExecutionContextInterface $context): void
    {
        $percentContext = $context->getvalidator()->inContext($context)->atPath('percent');

        $context->getValidator()->inContext($context)->atPath('taxExemptionReasons')->validate($taxCategory->getTaxExemptionReasons(), [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-32')
        ]);

        $taxEnum = TaxCategoryCode::tryFrom($taxCategory->getId()->value);

        if ($taxEnum && TaxCategoryCode::O !== $taxEnum) {
            $percentContext->validate($taxCategory->getPercent(), [
                new Assert\NotNull(message: 'BR-48')
            ]);
            // the correct percent value isn't validated there?
        }
        // this excludes O for XRechnung
        $percentContext->validate($taxCategory->getPercent(), [
            new Assert\NotNull(message: 'BR-DE-14', groups: ['XRechnung'])
        ]);

        switch ($taxEnum) {
            case TaxCategoryCode::E:
                if (!$taxCategory->getTaxExemptionReasonCode() && empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-E-10'
                    )
                        ->setCode('BR-E-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::S:
                if ($taxCategory->getTaxExemptionReasonCode() || !empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-S-10'
                    )
                        ->setCode('BR-S-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::Z:
                if (!$taxCategory->getTaxExemptionReasonCode() && empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-Z-10'
                    )
                        ->setCode('BR-Z-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::AE:
                if (!$taxCategory->getTaxExemptionReasonCode() && empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-AE-10'
                    )
                        ->setCode('BR-AE-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::G:
                if (!$taxCategory->getTaxExemptionReasonCode() && empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-G-10'
                    )
                        ->setCode('BR-G-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::O:
                if (!$taxCategory->getTaxExemptionReasonCode() && empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-O-10'
                    )
                        ->setCode('BR-O-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::K:
                if (!$taxCategory->getTaxExemptionReasonCode() && empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-IC-10'
                    )
                        ->setCode('BR-IC-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::L:
                if ($taxCategory->getTaxExemptionReasonCode() || !empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-AF-10'
                    )
                        ->setCode('BR-AF-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::M:
                if ($taxCategory->getTaxExemptionReasonCode() || !empty($taxCategory->getTaxExemptionReasons())) {
                    $context->buildViolation(
                        'BR-AG-10'
                    )
                        ->setCode('BR-AG-10')
                        ->atPath('taxExemptionReasonCode')
                        ->addViolation();
                }
                break;
            case TaxCategoryCode::B:
                break;
            default:
                $context->buildViolation('BR-CL-17')->atPath('id')->addViolation();
        }
    }
}