<?php


namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class InvoiceLineType
{
    /**
     * @param TextType[] $notes
     * @param PeriodType[] $invoicePeriods
     * @param OrderLineReferenceType[] $orderLineReferences
     * @param LineReferenceType[] $despatchLineReferences
     * @param LineReferenceType[] $receiptLineReferences
     * @param BillingReferenceType[] $billingReferences
     * @param DocumentReferenceType[] $documentReferences
     * @param DeliveryType[] $deliveries
     * @param PaymentTermsType[] $paymentTerms
     * @param AllowanceChargeType[] $allowanceCharges
     * @param TaxTotalType[] $taxTotals
     * @param TaxTotalType[] $withholdingTaxTotals
     * @param InvoiceLineType[] $subInvoiceLines
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('UUID')]
        protected ?IdentifierType $uuid = null,
        #[SerializedName('Note')]
        protected array $notes = [],
        #[SerializedName('InvoicedQuantity')]
        protected ?QuantityType $invoicedQuantity = null,
        #[SerializedName('LineExtensionAmount')]
        protected ?AmountType $lineExtensionAmount = null,
        #[SerializedName('TaxPointDate')]
        protected ?DateTimeInterface $taxPointDate = null,
        #[SerializedName('AccountingCostCode')]
        protected ?CodeType $accountingCostCode = null,
        #[SerializedName('AccountingCost')]
        protected ?TextType $accountingCost = null,
        #[SerializedName('PaymentPurposeCode')]
        protected ?CodeType $paymentPurposeCode = null,
        #[SerializedName('FreeOfChargeIndicator')]
        protected ?Indicator $freeOfChargeIndicator = null,
        #[SerializedName('InvoicePeriod')]
        protected array $invoicePeriods = [],
        #[SerializedName('OrderLineReference')]
        protected array $orderLineReferences = [],
        #[SerializedName('DespatchLineReference')]
        protected array $despatchLineReferences = [],
        #[SerializedName('ReceiptLineReference')]
        protected array $receiptLineReferences = [],
        #[SerializedName('BillingReference')]
        protected array $billingReferences = [],
        #[SerializedName('DocumentReference')]
        protected array $documentReferences = [],
        #[SerializedName('PricingReference')]
        protected ?PricingReferenceType $pricingReference = null,
        #[SerializedName('OriginatorParty')]
        protected ?PartyType $originatorParty = null,
        #[SerializedName('Delivery')]
        protected array $deliveries = [],
        #[SerializedName('PaymentTerms')]
        protected array $paymentTerms = [],
        #[SerializedName('AllowanceCharge')]
        protected array $allowanceCharges = [],
        #[SerializedName('TaxTotal')]
        protected array $taxTotals = [],
        #[SerializedName('WithholdingTaxTotal')]
        protected array $withholdingTaxTotals = [],
        #[SerializedName('Item')]
        protected ?ItemType $item = null,
        #[SerializedName('Price')]
        protected ?PriceType $price = null,
        #[SerializedName('DeliveryTerms')]
        protected ?DeliveryTermsType $deliveryTerms = null,
        #[SerializedName('SubInvoiceLine')]
        protected array $subInvoiceLines = [],
        #[SerializedName('ItemPriceExtension')]
        protected ?PriceExtensionType $itemPriceExtension = null,
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

    public function getUuid(): ?IdentifierType
    {
        return $this->uuid;
    }

    public function setUuid(?IdentifierType $uuid): void
    {
        $this->uuid = $uuid;
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

    public function getInvoicedQuantity(): ?QuantityType
    {
        return $this->invoicedQuantity;
    }

    public function setInvoicedQuantity(?QuantityType $invoicedQuantity): void
    {
        $this->invoicedQuantity = $invoicedQuantity;
    }

    public function getLineExtensionAmount(): ?AmountType
    {
        return $this->lineExtensionAmount;
    }

    public function setLineExtensionAmount(?AmountType $lineExtensionAmount): void
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
    }

    public function getTaxPointDate(): ?DateTimeInterface
    {
        return $this->taxPointDate;
    }

    public function setTaxPointDate(?DateTimeInterface $taxPointDate): void
    {
        $this->taxPointDate = $taxPointDate;
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

    public function getPaymentPurposeCode(): ?CodeType
    {
        return $this->paymentPurposeCode;
    }

    public function setPaymentPurposeCode(?CodeType $paymentPurposeCode): void
    {
        $this->paymentPurposeCode = $paymentPurposeCode;
    }

    public function getFreeOfChargeIndicator(): ?Indicator
    {
        return $this->freeOfChargeIndicator;
    }

    public function setFreeOfChargeIndicator(?Indicator $freeOfChargeIndicator): void
    {
        $this->freeOfChargeIndicator = $freeOfChargeIndicator;
    }

    /**
     * @return PeriodType[]
     */
    public function getInvoicePeriods(): array
    {
        return $this->invoicePeriods;
    }

    /**
     * @param PeriodType[] $invoicePeriods
     * @return void
     */
    public function setInvoicePeriods(array $invoicePeriods): void
    {
        $this->invoicePeriods = [];
        foreach ($invoicePeriods as $invoicePeriod) {
            $this->addInvoicePeriod($invoicePeriod);
        }
    }
    public function addInvoicePeriod(?PeriodType $invoicePeriod = null): PeriodType
    {
        return $this->invoicePeriods []= $invoicePeriod ?? new PeriodType;
    }

    /**
     * @return OrderLineReferenceType[]
     */
    public function getOrderLineReferences(): array
    {
        return $this->orderLineReferences;
    }

    /**
     * @param OrderLineReferenceType[] $orderLineReferences
     * @return void
     */
    public function setOrderLineReferences(array $orderLineReferences): void
    {
        $this->orderLineReferences = [];
        foreach ($orderLineReferences as $orderLineReference) {
            $this->addOrderLineReference($orderLineReference);
        }
    }

    public function addOrderLineReference(?OrderLineReferenceType $orderLineReference = null): OrderLineReferenceType
    {
        return $this->orderLineReferences []= $orderLineReference ?? new OrderLineReferenceType;
    }

    /**
     * @return LineReferenceType[]
     */
    public function getDespatchLineReferences(): array
    {
        return $this->despatchLineReferences;
    }

    /**
     * @param LineReferenceType[] $despatchLineReferences
     * @return void
     */
    public function setDespatchLineReferences(array $despatchLineReferences): void
    {
        $this->despatchLineReferences = [];
        foreach ($despatchLineReferences as $despatchLineReference) {
            $this->addDespatchLineReference($despatchLineReference);
        }
    }

    public function addDespatchLineReference(?LineReferenceType $despatchLineReference = null): LineReferenceType
    {
        return $this->despatchLineReferences []= $despatchLineReference ?? new LineReferenceType;
    }

    /**
     * @return LineReferenceType[]
     */
    public function getReceiptLineReferences(): array
    {
        return $this->receiptLineReferences;
    }

    /**
     * @param LineReferenceType[] $receiptLineReferences
     * @return void
     */
    public function setReceiptLineReferences(array $receiptLineReferences): void
    {
        $this->receiptLineReferences = [];
        foreach ($receiptLineReferences as $receiptLineReference) {
            $this->addReceiptLineReference($receiptLineReference);
        }
    }

    public function addReceiptLineReference(?LineReferenceType $receiptLineReference = null): LineReferenceType
    {
        return $this->receiptLineReferences []= $receiptLineReference ?? new LineReferenceType;
    }

    /**
     * @return BillingReferenceType[]
     */
    public function getBillingReferences(): array
    {
        return $this->billingReferences;
    }

    /**
     * @param BillingReferenceType[] $billingReferences
     * @return void
     */
    public function setBillingReferences(array $billingReferences): void
    {
        $this->billingReferences = [];
        foreach ($billingReferences as $billingReference) {
            $this->addBillingReference($billingReference);
        }
    }

    public function addBillingReference(?BillingReferenceType $billingReference = null): BillingReferenceType
    {
        return $this->billingReferences []= $billingReference ?? new BillingReferenceType;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getDocumentReferences(): array
    {
        return $this->documentReferences;
    }

    /**
     * @param DocumentReferenceType[] $documentReferences
     * @return void
     */
    public function setDocumentReferences(array $documentReferences): void
    {
        $this->documentReferences = [];
        foreach ($documentReferences as $documentReference) {
            $this->addDocumentReference($documentReference);
        }
    }

    public function addDocumentReference(?DocumentReferenceType $documentReference = null): DocumentReferenceType
    {
        return $this->documentReferences []= $documentReference ?? new DocumentReferenceType;
    }

    public function getPricingReference(): ?PricingReferenceType
    {
        return $this->pricingReference;
    }

    public function setPricingReference(?PricingReferenceType $pricingReference): void
    {
        $this->pricingReference = $pricingReference;
    }

    public function getOriginatorParty(): ?PartyType
    {
        return $this->originatorParty;
    }

    public function setOriginatorParty(?PartyType $originatorParty): void
    {
        $this->originatorParty = $originatorParty;
    }

    /**
     * @return DeliveryType[]
     */
    public function getDeliveries(): array
    {
        return $this->deliveries;
    }

    /**
     * @param DeliveryType[] $deliveries
     * @return void
     */
    public function setDeliveries(array $deliveries): void
    {
        $this->deliveries = [];
        foreach ($deliveries as $delivery) {
            $this->addDelivery($delivery);
        }
    }

    public function addDelivery(?DeliveryType $delivery = null): DeliveryType
    {
        return $this->deliveries []= $delivery ?? new DeliveryType();
    }

    /**
     * @return PaymentTermsType[]
     */
    public function getPaymentTerms(): array
    {
        return $this->paymentTerms;
    }

    /**
     * @param PaymentTermsType[] $paymentTerms
     * @return void
     */
    public function setPaymentTerms(array $paymentTerms): void
    {
        $this->paymentTerms = [];
        foreach ($paymentTerms as $paymentTerm) {
            $this->addPaymentTerm($paymentTerm);
        }
    }

    public function addPaymentTerm(?PaymentTermsType $paymentTerm = null): PaymentTermsType
    {
        return $this->paymentTerms []= $paymentTerm ?? new PaymentTermsType;
    }

    /**
     * @return AllowanceChargeType[]
     */
    public function getAllowanceCharges(): array
    {
        return $this->allowanceCharges;
    }

    /**
     * @param AllowanceChargeType[] $allowanceCharges
     * @return void
     */
    public function setAllowanceCharges(array $allowanceCharges): void
    {
        $this->allowanceCharges = [];
        foreach ($allowanceCharges as $allowanceCharge) {
            $this->addAllowanceCharge($allowanceCharge);
        }
    }

    public function addAllowanceCharge(?AllowanceChargeType $allowanceCharge = null): AllowanceChargeType
    {
        return $this->allowanceCharges []= $allowanceCharge ?? new AllowanceChargeType;
    }

    /**
     * @return TaxTotalType[]
     */
    public function getTaxTotals(): array
    {
        return $this->taxTotals;
    }

    /**
     * @param TaxTotalType[] $taxTotals
     * @return void
     */
    public function setTaxTotals(array $taxTotals): void
    {
        $this->taxTotals = [];
        foreach ($taxTotals as $taxTotal) {
            $this->addTaxTotal($taxTotal);
        }
    }

    public function addTaxTotal(?TaxTotalType $taxTotal = null): TaxTotalType
    {
        return $this->taxTotals []= $taxTotal ?? new TaxTotalType;
    }

    /**
     * @return TaxTotalType[]
     */
    public function getWithholdingTaxTotals(): array
    {
        return $this->withholdingTaxTotals;
    }

    /**
     * @param TaxTotalType[] $withholdingTaxTotals
     * @return void
     */
    public function setWithholdingTaxTotals(array $withholdingTaxTotals): void
    {
        $this->withholdingTaxTotals = [];
        foreach ($withholdingTaxTotals as $withholdingTaxTotal) {
            $this->addWithholdingTaxTotal($withholdingTaxTotal);
        }
    }

    public function addWithholdingTaxTotal(?TaxTotalType $withholdingTaxTotal = null): TaxTotalType
    {
        return $this->withholdingTaxTotals []= $withholdingTaxTotal ?? new TaxTotalType;
    }

    public function getItem(): ?ItemType
    {
        return $this->item;
    }

    public function setItem(?ItemType $item): void
    {
        $this->item = $item;
    }

    public function getPrice(): ?PriceType
    {
        return $this->price;
    }

    public function setPrice(?PriceType $price): void
    {
        $this->price = $price;
    }

    public function getDeliveryTerms(): ?DeliveryTermsType
    {
        return $this->deliveryTerms;
    }

    public function setDeliveryTerms(?DeliveryTermsType $deliveryTerms): void
    {
        $this->deliveryTerms = $deliveryTerms;
    }

    /**
     * @return InvoiceLineType[]
     */
    public function getSubInvoiceLines(): array
    {
        return $this->subInvoiceLines;
    }

    /**
     * @param InvoiceLineType[] $subInvoiceLines
     * @return void
     */
    public function setSubInvoiceLines(array $subInvoiceLines): void
    {
        $this->subInvoiceLines = [];
        foreach ($subInvoiceLines as $subInvoiceLine) {
            $this->addSubInvoiceLine($subInvoiceLine);
        }
    }

    public function addSubInvoiceLine(?InvoiceLineType $subInvoiceLine = null): InvoiceLineType
    {
        return $this->subInvoiceLines []= $subInvoiceLine ?? new InvoiceLineType;
    }

    public function getItemPriceExtension(): ?PriceExtensionType
    {
        return $this->itemPriceExtension;
    }

    public function setItemPriceExtension(?PriceExtensionType $itemPriceExtension): void
    {
        $this->itemPriceExtension = $itemPriceExtension;
    }
}