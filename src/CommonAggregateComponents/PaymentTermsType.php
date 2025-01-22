<?php


namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\PercentType;
use UBL\UnqualifiedDataTypes\TextType;

class PaymentTermsType
{
    /**
     * @param IdentifierType[] $PaymentMeansIDs
     * @param TextType[] $notes
     */
    public function __construct(
        #[SerializedName("ID")]
        protected ?IdentifierType $id = null,
        #[SerializedName("PaymentMeansID")]
        protected array $PaymentMeansIDs = [],
        #[SerializedName("PrepaidPaymentReferenceID")]
        protected ?IdentifierType $prepaidPaymentReferenceID = null,
        #[SerializedName("Note")]
        protected array $notes = [],
        #[SerializedName("ReferenceEventCode")]
        protected ?CodeType $referenceEventCode = null,
        #[SerializedName("SettlementDiscountPercent")]
        protected ?PercentType $settlementDiscountPercent = null,
        #[SerializedName("PenaltySurchargePercent")]
        protected ?PercentType $penaltySurchargePercent = null,
        #[SerializedName("PaymentPercent")]
        protected ?PercentType $paymentPercent = null,
        #[SerializedName("Amount")]
        protected ?AmountType $amount = null,
        #[SerializedName("SettlementDiscountAmount")]
        protected ?AmountType $settlementDiscountAmount = null,
        #[SerializedName("PenaltyAmount")]
        protected ?AmountType $penaltyAmount = null,
        #[SerializedName("PaymentTermsDetailsURI")]
        protected ?IdentifierType $paymentTermsDetailsURI = null,
        #[SerializedName("PaymentDueDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $paymentDueDate = null,
        #[SerializedName("InstallmentDueDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $InstallmentDueDate = null,
        #[SerializedName("InvoicingPartyReference")]
        protected ?TextType $invoicingPartyReference = null,
        #[SerializedName("SettlementPeriod")]
        protected ?PeriodType $settlementPeriod = null,
        #[SerializedName("PenaltyPeriod")]
        protected ?PeriodType $penaltyPeriod = null,
        #[SerializedName("ExchangeRate")]
        protected ?ExchangeRateType $exchangeRate = null,
        #[SerializedName("ValidityPeriod")]
        protected ?PeriodType $validityPeriod = null,
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

    /**
     * @return IdentifierType[]
     */
    public function getPaymentMeansIDs(): array
    {
        return $this->PaymentMeansIDs;
    }

    /**
     * @param IdentifierType[] $PaymentMeansIDs
     * @return void
     */
    public function setPaymentMeansIDs(array $PaymentMeansIDs): void
    {
        $this->PaymentMeansIDs = [];
        foreach ($PaymentMeansIDs as $paymentMeansID) {
            $this->addPaymentMeansID($paymentMeansID);
        }
    }

    public function addPaymentMeansID(?IdentifierType $PaymentMeansID = null): IdentifierType
    {
        return $this->PaymentMeansIDs []= $PaymentMeansID ?? new IdentifierType;
    }

    public function getPrepaidPaymentReferenceID(): ?IdentifierType
    {
        return $this->prepaidPaymentReferenceID;
    }

    public function setPrepaidPaymentReferenceID(?IdentifierType $prepaidPaymentReferenceID): void
    {
        $this->prepaidPaymentReferenceID = $prepaidPaymentReferenceID;
    }

    /**
     * @return TextType[]
     */
    public function getNotes(): array
    {
        return $this->notes;
    }

    /**
     * @param TextType[] $notes
     * @return void
     */
    public function setNotes(array $notes): void
    {
        $this->notes = [];
        foreach ($notes as $note) {
            $this->addNote($note);
        }
    }
    public function addNote(?TextType $note = null): TextType
    {
        return $this->notes []= $note ?? new TextType;
    }

    public function getReferenceEventCode(): ?CodeType
    {
        return $this->referenceEventCode;
    }

    public function setReferenceEventCode(?CodeType $referenceEventCode): void
    {
        $this->referenceEventCode = $referenceEventCode;
    }

    public function getSettlementDiscountPercent(): ?PercentType
    {
        return $this->settlementDiscountPercent;
    }

    public function setSettlementDiscountPercent(?PercentType $settlementDiscountPercent): void
    {
        $this->settlementDiscountPercent = $settlementDiscountPercent;
    }

    public function getPenaltySurchargePercent(): ?PercentType
    {
        return $this->penaltySurchargePercent;
    }

    public function setPenaltySurchargePercent(?PercentType $penaltySurchargePercent): void
    {
        $this->penaltySurchargePercent = $penaltySurchargePercent;
    }

    public function getPaymentPercent(): ?PercentType
    {
        return $this->paymentPercent;
    }

    public function setPaymentPercent(?PercentType $paymentPercent): void
    {
        $this->paymentPercent = $paymentPercent;
    }

    public function getAmount(): ?AmountType
    {
        return $this->amount;
    }

    public function setAmount(?AmountType $amount): void
    {
        $this->amount = $amount;
    }

    public function getSettlementDiscountAmount(): ?AmountType
    {
        return $this->settlementDiscountAmount;
    }

    public function setSettlementDiscountAmount(?AmountType $settlementDiscountAmount): void
    {
        $this->settlementDiscountAmount = $settlementDiscountAmount;
    }

    public function getPenaltyAmount(): ?AmountType
    {
        return $this->penaltyAmount;
    }

    public function setPenaltyAmount(?AmountType $penaltyAmount): void
    {
        $this->penaltyAmount = $penaltyAmount;
    }

    public function getPaymentTermsDetailsURI(): ?IdentifierType
    {
        return $this->paymentTermsDetailsURI;
    }

    public function setPaymentTermsDetailsURI(?IdentifierType $paymentTermsDetailsURI): void
    {
        $this->paymentTermsDetailsURI = $paymentTermsDetailsURI;
    }

    public function getPaymentDueDate(): ?DateTimeInterface
    {
        return $this->paymentDueDate;
    }

    public function setPaymentDueDate(?DateTimeInterface $paymentDueDate): void
    {
        $this->paymentDueDate = $paymentDueDate;
    }

    public function getInstallmentDueDate(): ?DateTimeInterface
    {
        return $this->InstallmentDueDate;
    }

    public function setInstallmentDueDate(?DateTimeInterface $InstallmentDueDate): void
    {
        $this->InstallmentDueDate = $InstallmentDueDate;
    }

    public function getInvoicingPartyReference(): ?TextType
    {
        return $this->invoicingPartyReference;
    }

    public function setInvoicingPartyReference(?TextType $invoicingPartyReference): void
    {
        $this->invoicingPartyReference = $invoicingPartyReference;
    }

    public function getSettlementPeriod(): ?PeriodType
    {
        return $this->settlementPeriod;
    }

    public function setSettlementPeriod(?PeriodType $settlementPeriod): void
    {
        $this->settlementPeriod = $settlementPeriod;
    }

    public function getPenaltyPeriod(): ?PeriodType
    {
        return $this->penaltyPeriod;
    }

    public function setPenaltyPeriod(?PeriodType $penaltyPeriod): void
    {
        $this->penaltyPeriod = $penaltyPeriod;
    }

    public function getExchangeRate(): ?ExchangeRateType
    {
        return $this->exchangeRate;
    }

    public function setExchangeRate(?ExchangeRateType $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function getValidityPeriod(): ?PeriodType
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?PeriodType $validityPeriod): void
    {
        $this->validityPeriod = $validityPeriod;
    }
}