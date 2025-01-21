<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\NumericType;
use UBL\UnqualifiedDataTypes\TextType;

class AllowanceChargeType
{
    /**
     * @param TextType[] $allowanceChargeReasons
     * @param TaxCategoryType[] $taxCategories
     * @param PaymentMeansType[] $paymentMeans
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('ChargeIndicator')]
        protected ?Indicator $chargeIndicator = null,
        #[SerializedName('AllowanceChargeReasonCode')]
        protected ?CodeType $allowanceChargeReasonCode = null,
        #[SerializedName('AllowanceChargeReason')]
        protected array $allowanceChargeReasons = [],
        #[SerializedName('MultiplierFactorNumeric')]
        protected ?NumericType $multiplierFactorNumeric = null,
        #[SerializedName('PrepaidIndicator')]
        protected ?Indicator $prepaidIndicator = null,
        #[SerializedName('SequenceNumeric')]
        protected ?NumericType $sequenceNumeric = null,
        #[SerializedName('Amount')]
        protected ?AmountType $amount = null,
        #[SerializedName('BaseAmount')]
        protected ?AmountType $baseAmount = null,
        #[SerializedName('AccountingCostCode')]
        protected ?CodeType $accountingCostCode = null,
        #[SerializedName('AccountingCost')]
        protected ?TextType $accountingCost = null,
        #[SerializedName('TaxCategory')]
        protected array $taxCategories = [],
        #[SerializedName('TaxTotal')]
        protected ?TaxTotalType $taxTotal = null,
        #[SerializedName('PaymentMeans')]
        protected array $paymentMeans = []
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
    
    public function getChargeIndicator(): ?Indicator
    {
        return $this->chargeIndicator;
    }

    public function setChargeIndicator(?Indicator $chargeIndicator): void
    {
        $this->chargeIndicator = $chargeIndicator;
    }

    public function getAllowanceChargeReasonCode(): ?CodeType
    {
        return $this->allowanceChargeReasonCode;
    }

    public function setAllowanceChargeReasonCode(?CodeType $allowanceChargeReasonCode): void
    {
        $this->allowanceChargeReasonCode = $allowanceChargeReasonCode;
    }

    /**
     * @return TextType[]
     */
    public function getAllowanceChargeReasons(): array
    {
        return $this->allowanceChargeReasons;
    }

    /**
     * @param TextType[] $allowanceChargeReasons
     * @return void
     */
    public function setAllowanceChargeReasons(array $allowanceChargeReasons): void
    {
        $this->allowanceChargeReasons = [];
        foreach ($allowanceChargeReasons as $allowanceChargeReason) {
            $this->addAllowanceChargeReason($allowanceChargeReason);
        }
    }

    public function addAllowanceChargeReason(TextType $allowanceChargeReason): void
    {
        $this->allowanceChargeReasons []= $allowanceChargeReason;
    }

    public function getMultiplierFactorNumeric(): ?NumericType
    {
        return $this->multiplierFactorNumeric;
    }

    public function setMultiplierFactorNumeric(?NumericType $multiplierFactorNumeric): void
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;
    }

    public function getPrepaidIndicator(): ?Indicator
    {
        return $this->prepaidIndicator;
    }

    public function setPrepaidIndicator(?Indicator $prepaidIndicator): void
    {
        $this->prepaidIndicator = $prepaidIndicator;
    }

    public function getSequenceNumeric(): ?NumericType
    {
        return $this->sequenceNumeric;
    }

    public function setSequenceNumeric(?NumericType $sequenceNumeric): void
    {
        $this->sequenceNumeric = $sequenceNumeric;
    }
    
    
    public function getAmount(): ?AmountType
    {
        return $this->amount;
    }

    public function setAmount(?AmountType $amount): void
    {
        $this->amount = $amount;
    }

    public function getBaseAmount(): ?AmountType
    {
        return $this->baseAmount;
    }

    public function setBaseAmount(?AmountType $baseAmount): void
    {
        $this->baseAmount = $baseAmount;
    }

    public function getAccountingCostCode(): ?CodeType
    {
        return $this->accountingCostCode;
    }

    public function setAccountingCostCode(?CodeType $accountingCostCode): void
    {
        $this->accountingCostCode = $accountingCostCode;
    }

    public function getAccountingCost(): ?TextType
    {
        return $this->accountingCost;
    }

    public function setAccountingCost(?TextType $accountingCost): void
    {
        $this->accountingCost = $accountingCost;
    }
    
    /**
     * @return TaxCategoryType[]
     */
    public function getTaxCategories(): array
    {
        return $this->taxCategories;
    }

    /**
     * @param TaxCategoryType[] $taxCategories
     * @return void
     */
    public function setTaxCategories(array $taxCategories): void
    {
        $this->taxCategories = [];
        foreach ($taxCategories as $taxCategory) {
            $this->addTaxCategory($taxCategory);
        }
    }

    public function addTaxCategory(TaxCategoryType $taxCategory): void
    {
        $this->taxCategories []= $taxCategory;
    }

    public function getTaxTotal(): ?TaxTotalType
    {
        return $this->taxTotal;
    }

    public function setTaxTotal(?TaxTotalType $taxTotal): void
    {
        $this->taxTotal = $taxTotal;
    }

    /**
     * @return PaymentMeansType[]
     */
    public function getPaymentMeans(): array
    {
        return $this->paymentMeans;
    }

    /**
     * @param PaymentMeansType[] $paymentMeans
     * @return void
     */
    public function setPaymentMeans(array $paymentMeans): void
    {
        $this->paymentMeans = [];
        foreach ($paymentMeans as $paymentMean) {
            $this->addPaymentMeans($paymentMean);
        }
    }

    public function addPaymentMeans(PaymentMeansType $paymentMeans): void
    {
        $this->paymentMeans []= $paymentMeans;
    }

}