<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\ValidatorException;
use UBL\Peppol\TaxCategoryCode;
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
        #[Assert\Valid]
        #[Assert\When("value?.getTaxScheme()?.getId()?.value == 'VAT'", [
            new Assert\Expression('value.getId()', '[BR-47]-Each VAT breakdown (BG-23) shall be defined through a VAT category code (BT-118).'),
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
            if ('O' !== $taxCat->getId()->value) {
                $context->getValidator()->inContext($context)->atPath('percent')->validate($taxCat->getPercent(), [
                    new Assert\NotNull(message: '[BR-48]-Each VAT breakdown (BG-23) shall have a VAT category rate (BT-119), except if the Invoice is not subject to VAT.')
                ]);
            }
            switch (TaxCategoryCode::tryFrom($taxCat->getId()->value)) {
                case TaxCategoryCode::E:
                    $context->getValidator()->inContext($context)->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-E-09')
                    ]);
                    if (!$taxCat->getTaxExemptionReasonCode() && empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            'BR-E-10'
                        )
                            ->setCode('BR-E-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::S:
                    $this->checkTaxAmount($context, 'BR-S-09');
                    if ($taxCat->getTaxExemptionReasonCode() || !empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            'BR-S-10'
                        )
                            ->setCode('BR-S-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::Z:
                    $context->getValidator()->inContext($context)->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-Z-09')
                    ]);
                    if (!$taxCat->getTaxExemptionReasonCode() && empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            'BR-Z-10'
                        )
                            ->setCode('BR-Z-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::AE:
                    $context->getValidator()->inContext($context)->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-AE-09')
                    ]);
                    if (!$taxCat->getTaxExemptionReasonCode() && empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            'BR-AE-10'
                        )
                            ->setCode('BR-AE-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::G:
                    $context->getValidator()->inContext($context)->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: 'BR-G-09')
                    ]);
                    if (!$taxCat->getTaxExemptionReasonCode() && empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            'BR-G-10'
                        )
                            ->setCode('BR-G-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::O:
                    $context->getValidator()->inContext($context)->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: '[BR-O-09]-The VAT category tax amount (BT-117) in a VAT breakdown (BG-23) where the VAT category code (BT-118) is "Not subject to VAT" shall be 0 (zero).')
                    ]);
                    if (!$taxCat->getTaxExemptionReasonCode() && empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            '[BR-O-10]-A VAT breakdown (BG-23) with VAT Category code (BT-118) " Not subject to VAT" shall have a VAT exemption reason code (BT-121), meaning " Not subject to VAT" or a VAT exemption reason text (BT-120) " Not subject to VAT" (or the equivalent standard text in another language).'
                        )
                            ->setCode('BR-O-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::K:
                    $context->getValidator()->inContext($context)->validate($this->taxAmount?->value, [
                        new Assert\EqualTo(0, message: '[BR-IC-09]-The VAT category tax amount (BT-117) in a VAT breakdown (BG-23) where the VAT category code (BT-118) is "Intra-community supply" shall be 0 (zero).')
                    ]);
                    if (!$taxCat->getTaxExemptionReasonCode() && empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            '[BR-IC-10]-A VAT breakdown (BG-23) with the VAT Category code (BT-118) "Intra-community supply" shall have a VAT exemption reason code (BT-121), meaning "Intra-community supply" or the VAT exemption reason text (BT-120) "Intra-community supply" (or the equivalent standard text in another language).'
                        )
                            ->setCode('BR-IC-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::L:
                    $this->checkTaxAmount($context, '[BR-AF-09]-The VAT category tax amount (BT-117) in a VAT breakdown (BG-23) where VAT category code (BT-118) is "IGIC" shall equal the VAT category taxable amount (BT-116) multiplied by the VAT category rate (BT-119).');
                    if ($taxCat->getTaxExemptionReasonCode() || !empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            '[BR-AF-10]-A VAT breakdown (BG-23) with VAT Category code (BT-118) "IGIC" shall not have a VAT exemption reason code (BT-121) or VAT exemption reason text (BT-120).'
                        )
                            ->setCode('BR-AF-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::M:
                    $this->checkTaxAmount($context, '[BR-AG-09]-The VAT category tax amount (BT-117) in a VAT breakdown (BG-23) where VAT category code (BT-118) is "IPSI" shall equal the VAT category taxable amount (BT-116) multiplied by the VAT category rate (BT-119).');
                    if ($taxCat->getTaxExemptionReasonCode() || !empty($taxCat->getTaxExemptionReasons())) {
                        $context->buildViolation(
                            '[BR-AG-10]-A VAT breakdown (BG-23) with VAT Category code (BT-118) "IPSI" shall not have a VAT exemption reason code (BT-121) or VAT exemption reason text (BT-120).'
                        )
                            ->setCode('BR-AG-10')
                            ->atPath('tax_category')
                            ->addViolation();
                    }
                    break;
                case TaxCategoryCode::B:
                    break;
                default:
                    throw new ValidatorException('[BR-CL-17]-Invoice tax categories MUST be coded using UNCL5305 code list');
            }
        }
    }

    protected function checkTaxAmount(ExecutionContextInterface $context, string $rule): void
    {
        if ($this->taxAmount?->value == null || $this->taxableAmount?->value == null || $this->percent?->value == null) {
            return;
        }
        $calcTax = round(abs($this->taxableAmount->value) * $this->percent->value / 100, 2);
        if (abs($this->taxAmount->value) - 1 < $calcTax && abs($this->taxAmount->value) + 1 > $calcTax) {
            return;
        }
        $context->addViolation($rule);
    }
}