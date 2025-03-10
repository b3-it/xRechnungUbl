<?php /** @noinspection PhpUnused */

namespace UBL;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents\AllowanceChargeType;
use UBL\CommonAggregateComponents\BillingReferenceType;
use UBL\CommonAggregateComponents\CustomerPartyType;
use UBL\CommonAggregateComponents\DeliveryTermsType;
use UBL\CommonAggregateComponents\DeliveryType;
use UBL\CommonAggregateComponents\DocumentReferenceType;
use UBL\CommonAggregateComponents\ExchangeRateType;
use UBL\CommonAggregateComponents\InvoiceLineType;
use UBL\CommonAggregateComponents\MonetaryTotalType;
use UBL\CommonAggregateComponents\OrderReferenceType;
use UBL\CommonAggregateComponents\PartyType;
use UBL\CommonAggregateComponents\PaymentMeansType;
use UBL\CommonAggregateComponents\PaymentTermsType;
use UBL\CommonAggregateComponents\PaymentType;
use UBL\CommonAggregateComponents\PeriodType;
use UBL\CommonAggregateComponents\ProjectReferenceType;
use UBL\CommonAggregateComponents\SignatureType;
use UBL\CommonAggregateComponents\SupplierPartyType;
use UBL\CommonAggregateComponents\TaxTotalType;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\NumericType;
use UBL\UnqualifiedDataTypes\TextType;

class Invoice
{
    const PREFIX = "ubl";
    const NS = "urn:oasis:names:specification:ubl:schema:xsd:Invoice-2";

    const ROOT_NAME = self::PREFIX . ":Invoice";

    /**
     * @param TextType[] $notes
     * @param PeriodType[] $invoicePeriods
     * @param BillingReferenceType[] $billingReferences
     * @param DocumentReferenceType[] $despatchDocumentReferences
     * @param DocumentReferenceType[] $receiptDocumentReferences
     * @param DocumentReferenceType[] $statementDocumentReferences
     * @param DocumentReferenceType[] $originatorDocumentReferences
     * @param DocumentReferenceType[] $contractDocumentReferences
     * @param DocumentReferenceType[] $additionalDocumentReferences
     * @param ProjectReferenceType[] $projectReferences
     * @param SignatureType[] $signatures
     * @param DeliveryType[] $deliveries
     * @param TaxTotalType[] $taxTotals
     *
     * @param PaymentMeansType[] $paymentMeans
     * @param PaymentTermsType[] $paymentTerms
     * @param AllowanceChargeType[] $allowanceCharges
     * @param TaxTotalType[] $withholdingTaxTotals
     * @param InvoiceLineType[] $invoiceLines
     */
    public function __construct(

        //#[SerializedName("ext:UBLExtensions")]
        #protected ?ext:UBLExtensionsType $ext:UBLExtensions = null,

        #[SerializedName("UBLVersionID")]
        protected ?IdentifierType $uBLVersionID = null,
        #[SerializedName("CustomizationID")]
        protected ?IdentifierType $customizationID = null,
        #[SerializedName("ProfileID")]
        protected ?IdentifierType $profileID = null,
        #[SerializedName("ProfileExecutionID")]
        protected ?IdentifierType $profileExecutionID = null,
        #[SerializedName("ID")]
        protected ?IdentifierType $id = null,
        #[SerializedName("CopyIndicator")]
        protected ?Indicator $copyIndicator = null,
        #[SerializedName("UUID")]
        protected ?IdentifierType $uUID = null,
        #[SerializedName("IssueDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $issueDate = null,
        #[SerializedName("IssueTime")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $issueTime = null,
        #[SerializedName("DueDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $dueDate = null,
        #[SerializedName("InvoiceTypeCode")]
        protected ?CodeType $invoiceTypeCode = null,
        #[SerializedName("Note")]
        protected array $notes = [],
        #[SerializedName("TaxPointDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $taxPointDate = null,
        #[SerializedName("DocumentCurrencyCode")]
        protected ?CodeType $documentCurrencyCode = null,
        #[SerializedName("TaxCurrencyCode")]
        protected ?CodeType $taxCurrencyCode = null,
        #[SerializedName("PricingCurrencyCode")]
        protected ?CodeType $pricingCurrencyCode = null,
        #[SerializedName("PaymentCurrencyCode")]
        protected ?CodeType $paymentCurrencyCode = null,
        #[SerializedName("PaymentAlternativeCurrencyCode")]
        protected ?CodeType $paymentAlternativeCurrencyCode = null,
        #[SerializedName("AccountingCostCode")]
        protected ?CodeType $accountingCostCode = null,
        #[SerializedName("AccountingCost")]
        protected ?TextType $accountingCost = null,
        #[SerializedName("LineCountNumeric")]
        protected ?NumericType $lineCountNumeric = null,
        #[SerializedName("BuyerReference")]
        protected ?TextType $buyerReference = null,
        #[SerializedName("InvoicePeriod")]
        protected array $invoicePeriods = [],
        #[SerializedName("OrderReference")]
        protected ?OrderReferenceType $orderReference = null,
        #[SerializedName("BillingReference")]
        protected array $billingReferences = [],
        #[SerializedName("DespatchDocumentReference")]
        protected array $despatchDocumentReferences = [],
        #[SerializedName("ReceiptDocumentReference")]
        protected array $receiptDocumentReferences = [],
        #[SerializedName("StatementDocumentReference")]
        protected array $statementDocumentReferences = [],
        #[SerializedName("OriginatorDocumentReference")]
        protected array $originatorDocumentReferences = [],
        #[SerializedName("ContractDocumentReference")]
        protected array $contractDocumentReferences = [],
        #[SerializedName("AdditionalDocumentReference")]
        protected array $additionalDocumentReferences = [],
        #[SerializedName("ProjectReference")]
        protected array $projectReferences = [],
        #[SerializedName("Signature")]
        protected array $signatures = [],
        #[SerializedName("AccountingSupplierParty")]
        protected ?SupplierPartyType $accountingSupplierParty = null,
        #[SerializedName("AccountingCustomerParty")]
        protected ?CustomerPartyType $accountingCustomerParty = null,
        #[SerializedName("PayeeParty")]
        protected ?PartyType $payeeParty = null,
        #[SerializedName("BuyerCustomerParty")]
        protected ?CustomerPartyType $buyerCustomerParty = null,
        #[SerializedName("SellerSupplierParty")]
        protected ?SupplierPartyType $sellerSupplierParty = null,
        #[SerializedName("TaxRepresentativeParty")]
        protected ?PartyType $taxRepresentativeParty = null,
        #[SerializedName("Delivery")]
        protected array $deliveries = [],
        #[SerializedName("DeliveryTerms")]
        protected ?DeliveryTermsType $deliveryTerms = null,
        #[SerializedName("PaymentMeans")]
        protected array $paymentMeans = [],
        #[SerializedName("PaymentTerms")]
        protected array $paymentTerms = [],
        #[SerializedName("PrepaidPayment")]
        protected array $prepaidPayments = [],
        #[SerializedName("AllowanceCharge")]
        protected array $allowanceCharges = [],
        #[SerializedName("TaxExchangeRate")]
        protected ?ExchangeRateType $taxExchangeRate = null,
        #[SerializedName("PricingExchangeRate")]
        protected ?ExchangeRateType $pricingExchangeRate = null,
        #[SerializedName("PaymentExchangeRate")]
        protected ?ExchangeRateType $paymentExchangeRate = null,
        #[SerializedName("PaymentAlternativeExchangeRate")]
        protected ?ExchangeRateType $paymentAlternativeExchangeRate = null,
        #[SerializedName("TaxTotal")]
        protected array $taxTotals = [],
        #[SerializedName("WithholdingTaxTotal")]
        protected array $withholdingTaxTotals = [],
        #[SerializedName("LegalMonetaryTotal")]
        protected ?MonetaryTotalType $legalMonetaryTotal = null,
        #[SerializedName("InvoiceLine")]
        protected array $invoiceLines = [],
    )
    {
    }

    /** @noinspection PhpUnused */
    #[SerializedName('@xmlns:' . self::PREFIX)]
    public function getUblNamespace(): string
    {
        return self::NS;
    }


    /** @noinspection PhpUnused */
    #[SerializedName('@xmlns:' . CommonAggregateComponents::PREFIX)]
    public function getCacNamespace(): string
    {
        return CommonAggregateComponents::NS;
    }


    /** @noinspection PhpUnused */
    #[SerializedName('@xmlns:' . CommonBasicComponents::PREFIX)]
    public function getCbcNamespace(): string
    {
        return CommonBasicComponents::NS;
    }

    public function getCustomizationID(): ?IdentifierType
    {
        return $this->customizationID;
    }

    public function setCustomizationID(?IdentifierType $customizationID): void
    {
        $this->customizationID = $customizationID;
    }

    public function getProfileID(): ?IdentifierType
    {
        return $this->profileID;
    }

    public function setProfileID(?IdentifierType $profileID): void
    {
        $this->profileID = $profileID;
    }

    public function getProfileExecutionID(): ?IdentifierType
    {
        return $this->profileExecutionID;
    }

    public function setProfileExecutionID(?IdentifierType $profileExecutionID): void
    {
        $this->profileExecutionID = $profileExecutionID;
    }

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(?DateTimeInterface $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    public function setIssueTime(?DateTimeInterface $issueTime): void
    {
        $this->issueTime = $issueTime;
    }

    public function getDueDate(): ?DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(?DateTimeInterface $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    public function getInvoiceTypeCode(): ?CodeType
    {
        return $this->invoiceTypeCode;
    }

    public function setInvoiceTypeCode(?CodeType $invoiceTypeCode): void
    {
        $this->invoiceTypeCode = $invoiceTypeCode;
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
        $this->notes = $notes;
    }

    public function getTaxPointDate(): ?DateTimeInterface
    {
        return $this->taxPointDate;
    }

    public function setTaxPointDate(?DateTimeInterface $taxPointDate): void
    {
        $this->taxPointDate = $taxPointDate;
    }

    public function getDocumentCurrencyCode(): ?CodeType
    {
        return $this->documentCurrencyCode;
    }

    public function setDocumentCurrencyCode(?CodeType $documentCurrencyCode): void
    {
        $this->documentCurrencyCode = $documentCurrencyCode;
    }

    public function getTaxCurrencyCode(): ?CodeType
    {
        return $this->taxCurrencyCode;
    }

    public function setTaxCurrencyCode(?CodeType $taxCurrencyCode): void
    {
        $this->taxCurrencyCode = $taxCurrencyCode;
    }

    public function getPricingCurrencyCode(): ?CodeType
    {
        return $this->pricingCurrencyCode;
    }

    public function setPricingCurrencyCode(?CodeType $pricingCurrencyCode): void
    {
        $this->pricingCurrencyCode = $pricingCurrencyCode;
    }

    public function getPaymentCurrencyCode(): ?CodeType
    {
        return $this->paymentCurrencyCode;
    }

    public function setPaymentCurrencyCode(?CodeType $paymentCurrencyCode): void
    {
        $this->paymentCurrencyCode = $paymentCurrencyCode;
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

    public function getBuyerReference(): ?TextType
    {
        return $this->buyerReference;
    }

    public function setBuyerReference(?TextType $buyerReference): void
    {
        $this->buyerReference = $buyerReference;
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

    public function getOrderReference(): ?OrderReferenceType
    {
        return $this->orderReference;
    }

    public function setOrderReference(?OrderReferenceType $orderReference): void
    {
        $this->orderReference = $orderReference;
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
        $this->billingReferences = $billingReferences;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getDespatchDocumentReferences(): array
    {
        return $this->despatchDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $despatchDocumentReferences
     * @return void
     */
    public function setDespatchDocumentReferences(array $despatchDocumentReferences): void
    {
        $this->despatchDocumentReferences = $despatchDocumentReferences;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getReceiptDocumentReferences(): array
    {
        return $this->receiptDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $receiptDocumentReferences
     * @return void
     */
    public function setReceiptDocumentReferences(array $receiptDocumentReferences): void
    {
        $this->receiptDocumentReferences = $receiptDocumentReferences;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getStatementDocumentReferences(): array
    {
        return $this->statementDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $statementDocumentReferences
     * @return void
     */
    public function setStatementDocumentReferences(array $statementDocumentReferences): void
    {
        $this->statementDocumentReferences = $statementDocumentReferences;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getOriginatorDocumentReferences(): array
    {
        return $this->originatorDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $originatorDocumentReferences
     * @return void
     */
    public function setOriginatorDocumentReferences(array $originatorDocumentReferences): void
    {
        $this->originatorDocumentReferences = $originatorDocumentReferences;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getContractDocumentReferences(): array
    {
        return $this->contractDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $contractDocumentReferences
     * @return void
     */
    public function setContractDocumentReferences(array $contractDocumentReferences): void
    {
        $this->contractDocumentReferences = $contractDocumentReferences;
    }



    /**
     * @return DocumentReferenceType[]
     */
    public function getAdditionalDocumentReferences(): array
    {
        return $this->additionalDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $additionalDocumentReferences
     * @return void
     */
    public function setAdditionalDocumentReferences(array $additionalDocumentReferences): void
    {
        $this->additionalDocumentReferences = $additionalDocumentReferences;
    }

    /**
     * @return ProjectReferenceType[]
     */
    public function getProjectReferences(): array
    {
        return $this->projectReferences;
    }

    /**
     * @param ProjectReferenceType[] $projectReferences
     * @return void
     */
    public function setProjectReferences(array $projectReferences): void
    {
        $this->projectReferences = $projectReferences;
    }

    public function getAccountingSupplierParty(): ?SupplierPartyType
    {
        return $this->accountingSupplierParty;
    }

    public function setAccountingSupplierParty(?SupplierPartyType $accountingSupplierParty): void
    {
        $this->accountingSupplierParty = $accountingSupplierParty;
    }

    public function getAccountingCustomerParty(): ?CustomerPartyType
    {
        return $this->accountingCustomerParty;
    }

    public function setAccountingCustomerParty(?CustomerPartyType $accountingCustomerParty): void
    {
        $this->accountingCustomerParty = $accountingCustomerParty;
    }

    public function getPayeeParty(): ?PartyType
    {
        return $this->payeeParty;
    }

    public function setPayeeParty(?PartyType $payeeParty): void
    {
        $this->payeeParty = $payeeParty;
    }

    public function getBuyerCustomerParty(): ?CustomerPartyType
    {
        return $this->buyerCustomerParty;
    }

    public function setBuyerCustomerParty(?CustomerPartyType $buyerCustomerParty): void
    {
        $this->buyerCustomerParty = $buyerCustomerParty;
    }

    public function getSellerSupplierParty(): ?SupplierPartyType
    {
        return $this->sellerSupplierParty;
    }

    public function setSellerSupplierParty(?SupplierPartyType $sellerSupplierParty): void
    {
        $this->sellerSupplierParty = $sellerSupplierParty;
    }

    public function getTaxRepresentativeParty(): ?PartyType
    {
        return $this->taxRepresentativeParty;
    }

    public function setTaxRepresentativeParty(?PartyType $taxRepresentativeParty): void
    {
        $this->taxRepresentativeParty = $taxRepresentativeParty;
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
        $this->deliveries = $deliveries;
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

    public function addPaymentMeans(?PaymentMeansType $paymentMeans = null): PaymentMeansType
    {
        return $this->paymentMeans []= $paymentMeans ?? new PaymentMeansType();
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
        foreach ($paymentTerms as $term) {
            $this->addPaymentTerms($term);
        }
    }

    public function addPaymentTerms(?PaymentTermsType $paymentTerms = null): PaymentTermsType
    {
        return $this->paymentTerms []= $paymentTerms ?? new PaymentTermsType();
    }

    /**
     * @return PaymentType[]
     */
    public function getPrepaidPayments(): array
    {
        return $this->prepaidPayments;
    }

    /**
     * @param PaymentType[] $prepaidPayments
     * @return void
     */
    public function setPrepaidPayments(array $prepaidPayments): void
    {
        $this->prepaidPayments = $prepaidPayments;
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
        $this->allowanceCharges = $allowanceCharges;
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

    public function getWithholdingTaxTotals(): array
    {
        return $this->withholdingTaxTotals;
    }

    public function setWithholdingTaxTotals(array $withholdingTaxTotals): void
    {
        $this->withholdingTaxTotals = $withholdingTaxTotals;
    }

    public function getLegalMonetaryTotal(): ?MonetaryTotalType
    {
        return $this->legalMonetaryTotal;
    }

    public function setLegalMonetaryTotal(?MonetaryTotalType $legalMonetaryTotal): void
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;
    }

    /**
     * @return InvoiceLineType[]
     */
    public function getInvoiceLines(): array
    {
        return $this->invoiceLines;
    }

    /**
     * @param InvoiceLineType[] $invoiceLines
     * @return void
     */
    public function setInvoiceLines(array $invoiceLines): void
    {
        $this->invoiceLines = [];
        foreach ($invoiceLines as $invoiceLine) {
            $this->addInvoiceLine($invoiceLine);
        }
    }

    public function addInvoiceLine(?InvoiceLineType $invoiceLine = null): InvoiceLineType
    {
        return $this->invoiceLines []= $invoiceLine ?? new InvoiceLineType;
    }
}