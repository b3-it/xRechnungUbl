<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\ValidatorException;
use UBL\Peppol\TaxCategoryCode;
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
        #[Assert\Count(max: 1, maxMessage: '[UBL-SR-34]-Invoice line note shall occur maximum once')]
        #[SerializedName('Note')]
        protected array $notes = [],
        #[Assert\Sequentially(constraints: [
            new Assert\NotNull(message: "[BR-22]-Each Invoice line (BG-25) shall have an Invoiced quantity (BT-129)."),
            new Assert\Expression(expression: 'value.unitCode !== null', message: "[BR-23]-An Invoice line (BG-25) shall have an Invoiced quantity unit of measure code (BT-130).")
        ])]
        #[SerializedName('InvoicedQuantity')]
        protected ?QuantityType $invoicedQuantity = null,
        #[Assert\NotNull(message: '[BR-24]-Each Invoice line (BG-25) shall have an Invoice line net amount (BT-131).')]
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
        #[Assert\Count(max: 1, maxMessage: '[UBL-SR-36]-Invoice line period shall occur maximum once')]
        #[Assert\All([
            new Assert\Expression('value.getStartDate() or value.getEndDate()', message: '[BR-CO-20]-If Invoice line period (BG-26) is used, the Invoice line period start date (BT-134) or the Invoice line period end date (BT-135) shall be filled, or both.'),
            new Assert\When('value.getStartDate() and value.getEndDate()', [
                new Assert\Expression('value.getEndDate() >= value.getStartDate()', message: '[BR-30]-If both Invoice line period start date (BT-134) and Invoice line period end date (BT-135) are given then the Invoice line period end date (BT-135) shall be later or equal to the Invoice line period start date (BT-134).')
            ]),
        ])]
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
        #[Assert\Count(max: 1, maxMessage: '[UBL-SR-52]-Document reference shall occur maximum once')]
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
        #[Assert\Valid]
        #[Assert\Sequentially([
            new Assert\NotNull,
            new Assert\Expression('value?.getName()?.value', message: '[BR-25]-Each Invoice line (BG-25) shall contain the Item name (BT-153).')
        ])]
        #[SerializedName('Item')]
        protected ?ItemType $item = null,
        #[Assert\Sequentially([
            new Assert\Expression('value?.getPriceAmount()', message: '[BR-26]-Each Invoice line (BG-25) shall contain the Item net price (BT-146).'),
            new Assert\Expression('value?.getPriceAmount() >= 0', message: '[BR-27]-The Item net price (BT-146) shall NOT be negative.')
        ])]
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

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
        if ($item = $this->getItem()) {
            foreach ($item->getCommodityClassifications() as $commodityClassification) {
                $context->getValidator()->inContext($context)->validate($commodityClassification, [
                    new Assert\When('value.getItemClassificationCode()', [
                        new Assert\Expression('value.getItemClassificationCode().listID', message: '[BR-65]-The Item classification identifier (BT-158) shall have a Scheme identifier.')
                    ])
                ]);
            }
            if ($standard = $item->getStandardItemIdentification()) {
                $context->getValidator()->inContext($context)->validate($standard, [
                    new Assert\Expression('value.getId()?.schemeID', message: '[BR-64]-The Item standard identifier (BT-157) shall have a Scheme identifier.')
                ]);
            }
            $context->getValidator()->inContext($context)->validate($item->getClassifiedTaxCategories(), [
                new Assert\Count(exactly: 1, exactMessage: '[UBL-SR-48]-Invoice lines shall have one and only one classified tax category.'),
                new Assert\All([
                    new Assert\When("value?.getTaxScheme()?.getId()?.value == 'VAT'", [
                        new Assert\Expression('value.getId()', '[BR-CO-04]-Each Invoice line (BG-25) shall be categorized with an Invoiced item VAT category code (BT-151).')
                    ])
                ])
            ]);

            foreach ($item->getClassifiedTaxCategories() as $taxCategory) {
                switch (TaxCategoryCode::tryFrom($taxCategory->getId()->value)) {
                    case TaxCategoryCode::O:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent(), [
                            new Assert\IsNull(message: '[BR-O-05]-An Invoice line (BG-25) where the VAT category code (BT-151) is "Not subject to VAT" shall not contain an Invoiced item VAT rate (BT-152).')
                        ]);
                        break;
                    case TaxCategoryCode::E:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                            new Assert\EqualTo(0, message: '[BR-E-05]-In an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "Exempt from VAT", the Invoiced item VAT rate (BT-152) shall be 0 (zero).')
                        ]);
                        break;
                    case TaxCategoryCode::AE:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                            new Assert\EqualTo(0, message: '[BR-AE-05]-In an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "Reverse charge" the Invoiced item VAT rate (BT-152) shall be 0 (zero).')
                        ]);
                        break;
                    case TaxCategoryCode::S:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                            new Assert\Positive(message: '[BR-S-05]-In an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "Standard rated" the Invoiced item VAT rate (BT-152) shall be greater than zero.')
                        ]);
                        break;
                    case TaxCategoryCode::Z:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                            new Assert\EqualTo(0, message: '[BR-Z-05]-In an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "Zero rated" the Invoiced item VAT rate (BT-152) shall be 0 (zero).')
                        ]);
                        break;
                    case TaxCategoryCode::G:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                            new Assert\EqualTo(0, message: '[BR-G-05]-In an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "Export outside the EU" the Invoiced item VAT rate (BT-152) shall be 0 (zero).')
                        ]);
                        break;
                    case TaxCategoryCode::K:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                            new Assert\EqualTo(0, message: '[BR-IC-05]-In an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "Intracommunity supply" the Invoiced item VAT rate (BT-152) shall be 0 (zero).')
                        ]);
                        break;
                    case TaxCategoryCode::L:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                            new Assert\PositiveOrZero(message: '[BR-AF-05]-In an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "IGIC" the invoiced item VAT rate (BT-152) shall be 0 (zero) or greater than zero.')
                        ]);
                        break;
                    case TaxCategoryCode::M:
                        $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                            new Assert\PositiveOrZero(message: '[BR-AG-05]-In an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "IPSI" the Invoiced item VAT rate (BT-152) shall be 0 (zero) or greater than zero.')
                        ]);
                        break;
                    case TaxCategoryCode::B:
                        break;
                    default:
                        throw new ValidatorException('[BR-CL-18]-Invoice tax categories MUST be coded using UNCL5305 code list');
                }
            }
        }

        foreach ($this->getAllowanceCharges() as $allowanceCharge) {
            $indi = $allowanceCharge->getChargeIndicator() == Indicator::TRUE;
            $context->getValidator()->inContext($context)->validate($allowanceCharge->getAmount(), [
                new Assert\NotNull(message: $indi ?
                    '[BR-43]-Each Invoice line charge (BG-28) shall have an Invoice line charge amount (BT-141).' :
                    '[BR-41]-Each Invoice line allowance (BG-27) shall have an Invoice line allowance amount (BT-136).')
            ]);
            if (!$allowanceCharge->getAllowanceChargeReasonCode() && empty($allowanceCharge->getAllowanceChargeReasons())) {
                $context->addViolation( $indi ?
                    '[BR-44]-Each Invoice line charge shall have an Invoice line charge reason or an invoice line allowance reason code.' :
                    '[BR-42]-Each Invoice line allowance (BG-27) shall have an Invoice line allowance reason (BT-139) or an Invoice line allowance reason code (BT-140).'
                );
            }
            $context->getValidator()->inContext($context)->validate($allowanceCharge->getTaxCategories(), [
                new Assert\Count(exactly: 0, exactMessage: '[UBL-CR-558]-A UBL invoice should not include the InvoiceLine AllowanceCharge TaxCategory')
            ]);
        }

        foreach ($this->getSubInvoiceLines() as $subInvoiceLine) {
            if ($subItem = $subInvoiceLine->getItem()) {
                $context->getValidator()->inContext($context)->validate($subItem->getClassifiedTaxCategories(), [
                    new Assert\Count(exactly: 1, exactMessage: '[BR-DEX-03] Eine Sub Invoice Line (BG-DEX-01) muss genau eine "SUB INVOICE LINE VAT INFORMATION" (BG-DEX-06) enthalten.')
                ]);
            }
        }
    }
}