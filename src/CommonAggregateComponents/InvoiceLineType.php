<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
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
        #[Assert\NotNull(message: 'BR-21')]
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('UUID')]
        protected ?IdentifierType $uuid = null,
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-34')]
        #[SerializedName('Note')]
        protected array $notes = [],
        #[Assert\Sequentially(constraints: [
            new Assert\NotNull(message: 'BR-22'),
            new Assert\Expression(expression: 'value.unitCode !== null', message: 'BR-23')
        ])]
        #[SerializedName('InvoicedQuantity')]
        protected ?QuantityType $invoicedQuantity = null,
        #[Assert\NotNull(message: 'BR-24')]
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
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-36')]
        #[Assert\All([
            new Assert\Expression('value.getStartDate() or value.getEndDate()', message: 'BR-CO-20'),
            new Assert\When('value.getStartDate() and value.getEndDate()', [
                new Assert\Expression('value.getEndDate() >= value.getStartDate()', message: 'BR-30')
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
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-52')]
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
        #[Assert\Valid]
        #[Assert\All(
            new Assert\Callback([self::class, 'validateAllowanceCharge'])
        )]
        #[SerializedName('AllowanceCharge')]
        protected array $allowanceCharges = [],
        #[SerializedName('TaxTotal')]
        protected array $taxTotals = [],
        #[SerializedName('WithholdingTaxTotal')]
        protected array $withholdingTaxTotals = [],
        #[Assert\Valid]
        #[Assert\Callback(callback: [self::class, 'validateItem'])]
        #[SerializedName('Item')]
        protected ?ItemType $item = null,
        #[Assert\Valid]
        #[Assert\Callback(callback: [self::class, 'validatePrice'])]
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
        foreach ($this->getSubInvoiceLines() as $subInvoiceLine) {
            if ($subItem = $subInvoiceLine->getItem()) {
                $context->getValidator()->inContext($context)->validate($subItem->getClassifiedTaxCategories(), [
                    new Assert\Count(exactly: 1, exactMessage: '[BR-DEX-03] Eine Sub Invoice Line (BG-DEX-01) muss genau eine "SUB INVOICE LINE VAT INFORMATION" (BG-DEX-06) enthalten.')
                ]);
            }
        }

        $orderLineReferenceIds = array_filter(array_map(
            fn(OrderLineReferenceType $orderLineReference) => $orderLineReference->getLineID(),
            $this->getOrderLineReferences()));
        $context->getValidator()->inContext($context)->validate($orderLineReferenceIds, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-35')
        ]);
    }

    public static function validateItem(?ItemType $item, ExecutionContextInterface $context): void
    {
        $context->getValidator()->inContext($context)->atPath('name')->validate($item?->getName()?->value, [
            new Assert\NotBlank(message: 'BR-25'),
        ]);
        if (is_null($item)) {
            return;
        }

        $context->getValidator()->inContext($context)->atPath('commodityClassifications')->validate(
            $item->getCommodityClassifications(), new Assert\All([
                new Assert\When('value.getItemClassificationCode()', [
                    new Assert\Expression('value.getItemClassificationCode().listID', message: 'BR-65')
                ])
            ])
        );
        if ($standard = $item->getStandardItemIdentification()) {
            $context->getValidator()->inContext($context)->atPath('standardItemIdentification')->validate($standard, [
                new Assert\Expression('value.getId()?.schemeID', message: 'BR-64')
            ]);
        }

        $context->getValidator()->inContext($context)->atPath('descriptions')->validate($item->getDescriptions(), [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-50')
        ]);

        $context->getValidator()->inContext($context)->atPath('classifiedTaxCategories')->validate($item->getClassifiedTaxCategories(), [
            new Assert\Count(exactly: 1, exactMessage: 'UBL-SR-48'),
            new Assert\All([
                new Assert\When("value?.getTaxScheme()?.getId()?.value == 'VAT'", [
                    new Assert\Expression('value.getId()', 'BR-CO-04')
                ]),
                new Assert\Callback(InvoiceLineType::validateTaxCategory(...))
            ])
        ]);
    }

    public static function validateTaxCategory(TaxCategoryType $taxCategory, ExecutionContextInterface $context): void
    {
        $percentContext = $context->getValidator()->inContext($context)->atPath('percent');
        switch (TaxCategoryCode::tryFrom($taxCategory->getId()->value)) {
            case TaxCategoryCode::O:
                $percentContext->validate($taxCategory->getPercent(), [
                    new Assert\IsNull(message: 'BR-O-05')
                ]);
                break;
            case TaxCategoryCode::E:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: 'BR-E-05')
                ]);
                break;
            case TaxCategoryCode::AE:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: 'BR-AE-05')
                ]);
                break;
            case TaxCategoryCode::S:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\Positive(message: 'BR-S-05')
                ]);
                break;
            case TaxCategoryCode::Z:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: 'BR-Z-05')
                ]);
                break;
            case TaxCategoryCode::G:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: 'BR-G-05')
                ]);
                break;
            case TaxCategoryCode::K:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: 'BR-IC-05')
                ]);
                break;
            case TaxCategoryCode::L:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\PositiveOrZero(message: 'BR-AF-05')
                ]);
                break;
            case TaxCategoryCode::M:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\PositiveOrZero(message: 'BR-AG-05')
                ]);
                break;
            case TaxCategoryCode::B:
                break;
            default:
                $context->buildViolation('BR-CL-18')->atPath('id')->addViolation();
        }
    }

    public static function validateAllowanceCharge(AllowanceChargeType  $allowanceCharge, ExecutionContextInterface $context): void
    {
        $indi = $allowanceCharge->getChargeIndicator() == Indicator::TRUE;
        $context->getValidator()->inContext($context)->atPath('amount')->validate($allowanceCharge->getAmount(), [
            new Assert\NotNull(message: $indi ? 'BR-43' : 'BR-41')
        ]);
        if (!$allowanceCharge->getAllowanceChargeReasonCode() && empty($allowanceCharge->getAllowanceChargeReasons())) {
            $context->buildViolation( $indi ? 'BR-44' : 'BR-42'
            )->atPath('allowanceChargeReasonCode')->addViolation();
        }
        $context->getValidator()->inContext($context)->validate($allowanceCharge->getTaxCategories(), [
            new Assert\Count(exactly: 0, exactMessage: '[UBL-CR-558]-A UBL invoice should not include the InvoiceLine AllowanceCharge TaxCategory')
        ]);
    }

    public static function validatePrice(?PriceType $price, ExecutionContextInterface $context): void
    {
        $context->getValidator()->inContext($context)->atPath('priceAmount')->validate($price?->getPriceAmount()?->value, [
            new Assert\NotNull(message: 'BR-26'),
            new Assert\PositiveOrZero(message: 'BR-27')
        ]);
        if (is_null($price)) {
            return;
        }
        $context->getValidator()->inContext($context)->atPath('allowanceCharges')->validate($price->getAllowanceCharges(), [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-37')
        ]);
    }
}