<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NumericType;

class PaymentMandateType
{
    /**
     * @param ClauseType[] $clauses
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('MandateTypeCode')]
        protected ?CodeType $mandateTypeCode = null,
        #[SerializedName('MaximumPaymentInstructionsNumeric')]
        protected ?NumericType $maximumPaymentInstructionsNumeric = null,
        #[SerializedName('MaximumPaidAmount')]
        protected ?AmountType $maximumPaidAmount = null,
        #[SerializedName('SignatureID')]
        protected ?IdentifierType $signatureID = null,
        #[SerializedName('PayerParty')]
        protected ?PartyType $payerParty = null,
        #[SerializedName('PayerFinancialAccount')]
        protected ?FinancialAccountType $payerFinancialAccount = null,
        #[SerializedName('ValidityPeriod')]
        protected ?PeriodType $validityPeriod = null,
        #[SerializedName('PaymentReversalPeriod')]
        protected ?PeriodType $paymentReversalPeriod = null,
        #[SerializedName('Clause')]
        protected array $clauses = []
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

    public function getMandateTypeCode(): ?CodeType
    {
        return $this->mandateTypeCode;
    }

    public function setMandateTypeCode(?CodeType $mandateTypeCode): void
    {
        $this->mandateTypeCode = $mandateTypeCode;
    }

    public function getMaximumPaymentInstructionsNumeric(): ?NumericType
    {
        return $this->maximumPaymentInstructionsNumeric;
    }

    public function setMaximumPaymentInstructionsNumeric(?NumericType $maximumPaymentInstructionsNumeric): void
    {
        $this->maximumPaymentInstructionsNumeric = $maximumPaymentInstructionsNumeric;
    }

    public function getMaximumPaidAmount(): ?AmountType
    {
        return $this->maximumPaidAmount;
    }

    public function setMaximumPaidAmount(?AmountType $maximumPaidAmount): void
    {
        $this->maximumPaidAmount = $maximumPaidAmount;
    }

    public function getSignatureID(): ?IdentifierType
    {
        return $this->signatureID;
    }

    public function setSignatureID(?IdentifierType $signatureID): void
    {
        $this->signatureID = $signatureID;
    }

    public function getPayerParty(): ?PartyType
    {
        return $this->payerParty;
    }

    public function setPayerParty(?PartyType $payerParty): void
    {
        $this->payerParty = $payerParty;
    }

    public function getPayerFinancialAccount(): ?FinancialAccountType
    {
        return $this->payerFinancialAccount;
    }

    public function setPayerFinancialAccount(?FinancialAccountType $payerFinancialAccount): void
    {
        $this->payerFinancialAccount = $payerFinancialAccount;
    }

    public function getValidityPeriod(): ?PeriodType
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?PeriodType $validityPeriod): void
    {
        $this->validityPeriod = $validityPeriod;
    }

    public function getPaymentReversalPeriod(): ?PeriodType
    {
        return $this->paymentReversalPeriod;
    }

    public function setPaymentReversalPeriod(?PeriodType $paymentReversalPeriod): void
    {
        $this->paymentReversalPeriod = $paymentReversalPeriod;
    }

    /**
     * @return ClauseType[]
     */
    public function getClauses(): array
    {
        return $this->clauses;
    }

    /**
     * @param ClauseType[] $clauses
     * @return void
     */
    public function setClauses(array $clauses): void
    {
        $this->clauses = [];
        foreach ($clauses as $clause) {
            $this->addClause($clause);
        }
    }

    public function addClause(ClauseType $clause): void
    {
        $this->clauses []= $clause;
    }
}