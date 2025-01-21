<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;

class BillingReferenceType
{
    /**
     * @param BillingReferenceLineType[] $billingReferenceLines
     */
    public function __construct(
        #[SerializedName('InvoiceDocumentReference')]
        protected ?DocumentReferenceType $invoiceDocumentReference = null,
        #[SerializedName('SelfBilledInvoiceDocumentReference')]
        protected ?DocumentReferenceType $selfBilledInvoiceDocumentReference = null,
        #[SerializedName('CreditNoteDocumentReference')]
        protected ?DocumentReferenceType $creditNoteDocumentReference = null,
        #[SerializedName('SelfBilledCreditNoteDocumentReference')]
        protected ?DocumentReferenceType $selfBilledCreditNoteDocumentReference = null,
        #[SerializedName('DebitNoteDocumentReference')]
        protected ?DocumentReferenceType $debitNoteDocumentReference = null,
        #[SerializedName('ReminderDocumentReference')]
        protected ?DocumentReferenceType $ReminderDocumentReference = null,
        #[SerializedName('AdditionalDocumentReference')]
        protected ?DocumentReferenceType $additionalDocumentReference = null,
        #[SerializedName('BillingReferenceLine')]
        protected array $billingReferenceLines = []
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getInvoiceDocumentReference(): ?DocumentReferenceType
    {
        return $this->invoiceDocumentReference;
    }

    public function setInvoiceDocumentReference(?DocumentReferenceType $invoiceDocumentReference): void
    {
        $this->invoiceDocumentReference = $invoiceDocumentReference;
    }

    public function getSelfBilledInvoiceDocumentReference(): ?DocumentReferenceType
    {
        return $this->selfBilledInvoiceDocumentReference;
    }

    public function setSelfBilledInvoiceDocumentReference(?DocumentReferenceType $selfBilledInvoiceDocumentReference): void
    {
        $this->selfBilledInvoiceDocumentReference = $selfBilledInvoiceDocumentReference;
    }

    public function getCreditNoteDocumentReference(): ?DocumentReferenceType
    {
        return $this->creditNoteDocumentReference;
    }

    public function setCreditNoteDocumentReference(?DocumentReferenceType $creditNoteDocumentReference): void
    {
        $this->creditNoteDocumentReference = $creditNoteDocumentReference;
    }

    public function getSelfBilledCreditNoteDocumentReference(): ?DocumentReferenceType
    {
        return $this->selfBilledCreditNoteDocumentReference;
    }

    public function setSelfBilledCreditNoteDocumentReference(?DocumentReferenceType $selfBilledCreditNoteDocumentReference): void
    {
        $this->selfBilledCreditNoteDocumentReference = $selfBilledCreditNoteDocumentReference;
    }

    public function getDebitNoteDocumentReference(): ?DocumentReferenceType
    {
        return $this->debitNoteDocumentReference;
    }

    public function setDebitNoteDocumentReference(?DocumentReferenceType $debitNoteDocumentReference): void
    {
        $this->debitNoteDocumentReference = $debitNoteDocumentReference;
    }

    public function getReminderDocumentReference(): ?DocumentReferenceType
    {
        return $this->ReminderDocumentReference;
    }

    public function setReminderDocumentReference(?DocumentReferenceType $ReminderDocumentReference): void
    {
        $this->ReminderDocumentReference = $ReminderDocumentReference;
    }

    public function getAdditionalDocumentReference(): ?DocumentReferenceType
    {
        return $this->additionalDocumentReference;
    }

    public function setAdditionalDocumentReference(?DocumentReferenceType $additionalDocumentReference): void
    {
        $this->additionalDocumentReference = $additionalDocumentReference;
    }

    /**
     * @return BillingReferenceLineType[]
     */
    public function getBillingReferenceLines(): array
    {
        return $this->billingReferenceLines;
    }

    /**
     * @param BillingReferenceLineType[] $billingReferenceLines
     * @return void
     */
    public function setBillingReferenceLines(array $billingReferenceLines): void
    {
        $this->billingReferenceLines = [];
        foreach ($billingReferenceLines as $billingReferenceLine) {
            $this->addBillingReferenceLine($billingReferenceLine);
        }
    }

    public function addBillingReferenceLine(BillingReferenceLineType $billingReferenceLine): void
    {
        $this->billingReferenceLines []= $billingReferenceLine;
    }

}