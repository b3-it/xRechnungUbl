<?php /** @noinspection PhpUnused */

namespace UBL;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use UBL\CommonAggregateComponents\AddressType;
use UBL\CommonAggregateComponents\AllowanceChargeType;
use UBL\CommonAggregateComponents\BillingReferenceType;
use UBL\CommonAggregateComponents\ContactType;
use UBL\CommonAggregateComponents\CustomerPartyType;
use UBL\CommonAggregateComponents\DeliveryTermsType;
use UBL\CommonAggregateComponents\DeliveryType;
use UBL\CommonAggregateComponents\DocumentReferenceType;
use UBL\CommonAggregateComponents\ExchangeRateType;
use UBL\CommonAggregateComponents\InvoiceLineType;
use UBL\CommonAggregateComponents\MonetaryTotalType;
use UBL\CommonAggregateComponents\OrderReferenceType;
use UBL\CommonAggregateComponents\PartyIdentificationType;
use UBL\CommonAggregateComponents\PartyLegalEntityType;
use UBL\CommonAggregateComponents\PartyNameType;
use UBL\CommonAggregateComponents\PartyTaxSchemeType;
use UBL\CommonAggregateComponents\PartyType;
use UBL\CommonAggregateComponents\PaymentMeansType;
use UBL\CommonAggregateComponents\PaymentTermsType;
use UBL\CommonAggregateComponents\PaymentType;
use UBL\CommonAggregateComponents\PeriodType;
use UBL\CommonAggregateComponents\ProjectReferenceType;
use UBL\CommonAggregateComponents\SignatureType;
use UBL\CommonAggregateComponents\SupplierPartyType;
use UBL\CommonAggregateComponents\TaxCategoryType;
use UBL\CommonAggregateComponents\TaxSubtotalType;
use UBL\CommonAggregateComponents\TaxTotalType;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\Peppol\TaxCategoryCode;
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

    const XR_MAJOR_MINOR_VERSION = "3.0";
    const XR_CIUS_ID = 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_' . self::XR_MAJOR_MINOR_VERSION;
    const XR_EXTENSION_ID = self::XR_CIUS_ID . '#conformant#urn:xeinkauf.de:kosit:extension:xrechnung_' . self::XR_MAJOR_MINOR_VERSION;

    const PROFILE_ID = "urn:fdc:peppol.eu:2017:poacc:billing:01:1.0";

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
        protected ?IdentifierType     $uBLVersionID = null,
        #[Assert\NotNull(message: 'BR-01')]
        #[SerializedName("CustomizationID")]
        protected ?IdentifierType     $customizationID = null,
        #[Assert\NotNull(message: 'PEPPOL-EN16931-R001', groups: ['XRechnung'])]
        #[SerializedName("ProfileID")]
        protected ?IdentifierType     $profileID = null,
        #[SerializedName("ProfileExecutionID")]
        protected ?IdentifierType     $profileExecutionID = null,
        #[Assert\NotNull(message: 'BR-02')]
        #[SerializedName("ID")]
        protected ?IdentifierType     $id = null,
        #[SerializedName("CopyIndicator")]
        protected ?Indicator          $copyIndicator = null,
        #[SerializedName("UUID")]
        protected ?IdentifierType     $uUID = null,
        #[Assert\NotNull(message: 'BR-03')]
        #[SerializedName("IssueDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface  $issueDate = null,
        #[SerializedName("IssueTime")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface  $issueTime = null,
        #[SerializedName("DueDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface  $dueDate = null,
        #[Assert\NotNull(message: 'BR-04')]
        #[SerializedName("InvoiceTypeCode")]
        protected ?CodeType           $invoiceTypeCode = null,
        #[SerializedName("Note")]
        protected array               $notes = [],
        #[SerializedName("TaxPointDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface  $taxPointDate = null,
        #[Assert\NotNull(message: 'BR-05')]
        #[SerializedName("DocumentCurrencyCode")]
        protected ?CodeType           $documentCurrencyCode = null,
        #[SerializedName("TaxCurrencyCode")]
        protected ?CodeType           $taxCurrencyCode = null,
        #[SerializedName("PricingCurrencyCode")]
        protected ?CodeType           $pricingCurrencyCode = null,
        #[SerializedName("PaymentCurrencyCode")]
        protected ?CodeType           $paymentCurrencyCode = null,
        #[SerializedName("PaymentAlternativeCurrencyCode")]
        protected ?CodeType           $paymentAlternativeCurrencyCode = null,
        #[SerializedName("AccountingCostCode")]
        protected ?CodeType           $accountingCostCode = null,
        #[SerializedName("AccountingCost")]
        protected ?TextType           $accountingCost = null,
        #[SerializedName("LineCountNumeric")]
        protected ?NumericType        $lineCountNumeric = null,
        #[Assert\Valid]
        #[Assert\Count(max: 1, maxMessage: 'BR-DE-15', groups: ['XRechnung'])]
        #[SerializedName("BuyerReference")]
        protected ?TextType           $buyerReference = null,
        #[Assert\Valid]
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-08')]
        #[Assert\All([
            new Assert\Callback([self::class, 'validateInvoicePeriod'])
        ])]
        #[SerializedName("InvoicePeriod")]
        protected array               $invoicePeriods = [],
        #[SerializedName("OrderReference")]
        protected ?OrderReferenceType $orderReference = null,
        #[Assert\Valid]
        #[SerializedName("BillingReference")]
        protected array               $billingReferences = [],
        #[Assert\Valid]
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-03')]
        #[SerializedName("DespatchDocumentReference")]
        protected array               $despatchDocumentReferences = [],
        #[Assert\Valid]
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-02')]
        #[SerializedName("ReceiptDocumentReference")]
        protected array               $receiptDocumentReferences = [],
        #[SerializedName("StatementDocumentReference")]
        protected array               $statementDocumentReferences = [],
        #[SerializedName("OriginatorDocumentReference")]
        protected array               $originatorDocumentReferences = [],
        #[Assert\Valid]
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-01')]
        #[SerializedName("ContractDocumentReference")]
        protected array               $contractDocumentReferences = [],
        #[SerializedName("AdditionalDocumentReference")]
        protected array               $additionalDocumentReferences = [],
        #[SerializedName("ProjectReference")]
        protected array               $projectReferences = [],
        #[SerializedName("Signature")]
        protected array               $signatures = [],
        #[Assert\Valid]
        #[Assert\Callback([self::class, 'validateAccountingSupplierParty'])]
        #[SerializedName("AccountingSupplierParty")]
        protected ?SupplierPartyType  $accountingSupplierParty = null,
        #[Assert\Valid]
        #[Assert\Callback([self::class, 'validateAccountingCustomerParty'])]
        #[SerializedName("AccountingCustomerParty")]
        protected ?CustomerPartyType  $accountingCustomerParty = null,
        #[Assert\Valid]
        #[SerializedName("PayeeParty")]
        protected ?PartyType          $payeeParty = null,
        #[SerializedName("BuyerCustomerParty")]
        protected ?CustomerPartyType  $buyerCustomerParty = null,
        #[SerializedName("SellerSupplierParty")]
        protected ?SupplierPartyType  $sellerSupplierParty = null,
        #[Assert\Valid]
        #[Assert\Callback([self::class, 'validateTaxRepresentativeParty'])]
        #[SerializedName("TaxRepresentativeParty")]
        protected ?PartyType          $taxRepresentativeParty = null,
        #[Assert\Valid]
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-24')]
        #[SerializedName("Delivery")]
        protected array               $deliveries = [],
        #[SerializedName("DeliveryTerms")]
        protected ?DeliveryTermsType  $deliveryTerms = null,
        #[Assert\Valid]
        #[Assert\Count(min: 1, minMessage: 'BR-DE-1', groups: ['XRechnung'])]
        #[SerializedName("PaymentMeans")]
        protected array               $paymentMeans = [],
        #[SerializedName("PaymentTerms")]
        protected array               $paymentTerms = [],
        #[SerializedName("PrepaidPayment")]
        protected array               $prepaidPayments = [],
        #[Assert\Valid]
        #[Assert\All(
            new Assert\Callback([self::class, 'validateAllowanceCharge'])
        )]
        #[SerializedName("AllowanceCharge")]
        protected array               $allowanceCharges = [],
        #[SerializedName("TaxExchangeRate")]
        protected ?ExchangeRateType   $taxExchangeRate = null,
        #[SerializedName("PricingExchangeRate")]
        protected ?ExchangeRateType   $pricingExchangeRate = null,
        #[SerializedName("PaymentExchangeRate")]
        protected ?ExchangeRateType   $paymentExchangeRate = null,
        #[SerializedName("PaymentAlternativeExchangeRate")]
        protected ?ExchangeRateType   $paymentAlternativeExchangeRate = null,
        #[Assert\Valid]
        #[SerializedName("TaxTotal")]
        protected array               $taxTotals = [],
        #[Assert\Valid]
        #[SerializedName("WithholdingTaxTotal")]
        protected array               $withholdingTaxTotals = [],
        #[Assert\NotNull]
        #[Assert\Valid]
        #[SerializedName("LegalMonetaryTotal")]
        protected ?MonetaryTotalType  $legalMonetaryTotal = null,
        #[Assert\Count(
            min: 1, minMessage: 'BR-16'
        )]
        #[Assert\Valid]
        #[SerializedName("InvoiceLine")]
        protected array               $invoiceLines = [],
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
        return $this->invoicePeriods [] = $invoicePeriod ?? new PeriodType;
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
        return $this->paymentMeans [] = $paymentMeans ?? new PaymentMeansType();
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
        return $this->paymentTerms [] = $paymentTerms ?? new PaymentTermsType();
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
        return $this->allowanceCharges [] = $allowanceCharge ?? new AllowanceChargeType;
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
        return $this->taxTotals [] = $taxTotal ?? new TaxTotalType;
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
        return $this->invoiceLines [] = $invoiceLine ?? new InvoiceLineType;
    }

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
        $context->getValidator()->inContext($context)->atPath('documentCurrencyCode')->validate($this->getDocumentCurrencyCode()?->value, [
            new Assert\Currency(message: 'BR-CL-04')
        ]);
        $context->getValidator()->inContext($context)->atPath('taxCurrencyCode')->validate($this->getTaxCurrencyCode()?->value, [
            new Assert\NotEqualTo($this->getDocumentCurrencyCode()?->value, message: 'PEPPOL-EN16931-R005', groups: ['XRechnung']),
            new Assert\Currency(message: 'BR-CL-05')
        ]);

        $invoicePeriodDescriptionCodes = array_merge([], ...array_map(
            fn (PeriodType $period) => $period->getDescriptionCodes(),
            $this->getInvoicePeriods()
        ));
        $context->getValidator()->inContext($context)->atPath('invoicePeriods.descriptionCodes')->validate($invoicePeriodDescriptionCodes, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-49')
        ]);

        // PaymentMeans PaymentDueDate should not be there anyway because of UBL-CR-412
        $paymentMeansDueDates = array_filter(array_map(
            fn(PaymentMeansType $paymentMeans) => $paymentMeans->getPaymentDueDate(),
            $this->getPaymentMeans()
        ));
        $context->getValidator()->inContext($context)->validate($paymentMeansDueDates, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-45')
        ]);
        $paymentMeansCodeNames = array_filter(array_map(
            fn(PaymentMeansType $paymentMeans) => $paymentMeans->getPaymentMeansCode()->name,
            $this->getPaymentMeans()
        ));
        $context->getValidator()->inContext($context)->validate($paymentMeansCodeNames, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-46')
        ]);


        $paymentMeansCardAccounts = array_filter(array_map(
            fn(PaymentMeansType $paymentMeans) => $paymentMeans->getCardAccount(),
            $this->getPaymentMeans()
        ));
        $context->getValidator()->inContext($context)->validate($paymentMeansCardAccounts, [
            new Assert\Count(max: 1, maxMessage: 'BR-66')
        ]);
        $paymentMeansPaymentMandates = array_filter(array_map(
            fn(PaymentMeansType $paymentMeans) => $paymentMeans->getPaymentMandate(),
            $this->getPaymentMeans()
        ));
        $context->getValidator()->inContext($context)->validate($paymentMeansPaymentMandates, [
            new Assert\Count(max: 1, maxMessage: 'BR-67')
        ]);
        if (empty(!$paymentMeansPaymentMandates)) {
            $sepaSupplier = array_filter(
                $this->getAccountingSupplierParty()?->getParty()?->getPartyIdentifications() ?? [],
                fn(PartyIdentificationType $partyIdentification) => $partyIdentification->id->schemeID === 'SEPA',
            );

            $context->getValidator()->inContext($context)->atPath('accountingSupplierParty.party.partyIdentifications')->validate($sepaSupplier, [
                new Assert\Count(min: 1, minMessage: 'BR-DE-30', groups: ['XRechnung']),
            ]);
        }

        $paymentTermsNotes = array_merge([], ...array_map(fn(PaymentTermsType $paymentTerms) => $paymentTerms->getNotes(), $this->getPaymentTerms()));
        $context->getValidator()->inContext($context)->validate($paymentTermsNotes, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-05')
        ]);

        $hasTaxSchemeParty = false;
        if ($supplierPartyParty = $this->getAccountingSupplierParty()?->getParty()) {
            $hasTaxSchemeParty = array_any($supplierPartyParty->getPartyTaxSchemes(), fn(PartyTaxSchemeType $partyTaxScheme) => $partyTaxScheme->getCompanyID());
        }
        if (!$hasTaxSchemeParty && $taxParty = $this->getTaxRepresentativeParty()) {
            $hasTaxSchemeParty = array_any($taxParty->getPartyTaxSchemes(), fn(PartyTaxSchemeType $partyTaxScheme) => $partyTaxScheme->getTaxScheme()->getId()->value === 'VAT' && $partyTaxScheme->getCompanyID());
        }

        /**
         * @var $taxSubTotals TaxSubtotalType[]
         */
        $taxSubTotals = array_merge([], ...array_map(
            fn(TaxTotalType $taxTotal) => $taxTotal->getTaxSubtotals(),
            $this->getTaxTotals()
        ));
        $context->getValidator()->inContext($context)->validate($taxSubTotals, [
            new Assert\Count(
                min: 1,
                minMessage: 'BR-CO-18'
            ),
            new Assert\Count(
                exactly: 1, exactMessage: 'PEPPOL-EN16931-R053', groups: ['XRechnung']
            )
        ]);
        $taxWithoutSubTotals = array_filter($this->getTaxTotals(),
            fn(TaxTotalType $taxTotal) => empty($taxTotal->getTaxSubtotals())
        );
        $context->getValidator()->inContext($context)->validate($taxWithoutSubTotals, [
            new Assert\Count(
                exactly: $this->getTaxCurrencyCode() ? 1 : 0, exactMessage: 'PEPPOL-EN16931-R054', groups: ['XRechnung']
            )
        ]);
        $classifiedTaxCategories = [];
        foreach ($this->getInvoiceLines() as $invoiceLine) {
            if ($item = $invoiceLine->getItem()) {
                array_push($classifiedTaxCategories, ...$item->getClassifiedTaxCategories());
            }
            foreach ($invoiceLine->getSubInvoiceLines() as $subInvoiceLine) {
                if ($subItem = $subInvoiceLine->getItem()) {
                    array_push($classifiedTaxCategories, ...$subItem->getClassifiedTaxCategories());
                }
            }
        }
        $allowanceTaxCategories = [];
        foreach ($this->getAllowanceCharges() as $allowanceCharge) {
            array_push($allowanceTaxCategories, ...$allowanceCharge->getTaxCategories());
        }

        $this->validateByVatCategoryRule01Percent($taxSubTotals, $classifiedTaxCategories, $allowanceTaxCategories, $context, 'S',
            'BR-S-01'
        );
        if (!$hasTaxSchemeParty) {
            $this->validateByVatCategoryRules($classifiedTaxCategories, $context, 'S',
                rule02: 'BR-S-02',
                rule03: 'BR-S-03',
                rule04: 'BR-S-04'
            );
        }
        $this->checkTaxableAmountWithPercent($taxSubTotals, $context, 'S', 'BR-S-08');

        $this->validateByVatCategoryRule01($taxSubTotals, $classifiedTaxCategories, $allowanceTaxCategories, $context, 'E',
            'BR-E-01'
        );
        if (!$hasTaxSchemeParty) {
            $this->validateByVatCategoryRules($classifiedTaxCategories, $context, 'E',
                rule02: 'BR-E-02',
                rule03: 'BR-E-03',
                rule04: 'BR-E-04');
        }
        $this->checkTaxableAmount($taxSubTotals, $context, 'E', 'BR-E-08');

        $this->validateByVatCategoryRule01($taxSubTotals, $classifiedTaxCategories, $allowanceTaxCategories, $context, 'AE',
            'BR-AE-01'
        );
        if (!$hasTaxSchemeParty) {
            $this->validateByVatCategoryRules($classifiedTaxCategories, $context, 'AE',
                rule02: 'BR-AE-02',
                rule03: 'BR-AE-03',
                rule04: 'BR-AE-04');
        }
        $this->checkTaxableAmount($taxSubTotals, $context, 'AE', 'BR-AE-08');

        $this->validateByVatCategoryRule01($taxSubTotals, $classifiedTaxCategories, $allowanceTaxCategories, $context, 'G',
            'BR-G-01'
        );
        if (!$hasTaxSchemeParty) {
            $this->validateByVatCategoryRules($classifiedTaxCategories, $context, 'G',
                rule02: 'BR-G-02',
                rule03: 'BR-G-03',
                rule04: 'BR-G-04');
        }
        $this->checkTaxableAmount($taxSubTotals, $context, 'G', 'BR-G-08');

        $this->validateByVatCategoryRule01($taxSubTotals, $classifiedTaxCategories, $allowanceTaxCategories, $context, 'Z',
            'BR-Z-01'
        );
        if (!$hasTaxSchemeParty) {
            $this->validateByVatCategoryRules($classifiedTaxCategories, $context, 'Z',
                rule02: 'BR-Z-02',
                rule03: 'BR-Z-03',
                rule04: 'BR-Z-04');
        }
        $this->checkTaxableAmount($taxSubTotals, $context, 'Z', 'BR-Z-08');
    }

    protected function validateByVatCategoryRule01(
        array                     $taxSubTotals, array $classifiedTaxCategories, array $allowanceTaxCategories,
        ExecutionContextInterface $context, string $vatId, string $rule01): void
    {
        $filter = fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === $vatId;

        if ((count(array_filter($taxSubTotals, fn(TaxSubtotalType $subtotal) => $subtotal->getTaxCategory()->getId()->value === $vatId)) == 1) !== (
                array_any($classifiedTaxCategories, $filter) || array_any($allowanceTaxCategories, $filter)
            )) {
            $context->buildViolation($rule01)->addViolation();
        }
    }

    protected function validateByVatCategoryRule01Percent(
        array                     $taxSubTotals, array $classifiedTaxCategories, array $allowanceTaxCategories,
        ExecutionContextInterface $context, string $vatId, string $rule01): void
    {
        $filter = fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === $vatId;
        if (array_any($taxSubTotals, fn(TaxSubtotalType $subtotal) => $subtotal->getTaxCategory()->getId()->value === $vatId) !== (
                array_any($classifiedTaxCategories, $filter) || array_any($allowanceTaxCategories, $filter)
            )) {
            $context->buildViolation($rule01)->addViolation();
        }
    }

    protected function validateByVatCategoryRules(
        array $classifiedTaxCategories, ExecutionContextInterface $context, string $vatId, string $rule02, string $rule03, string $rule04): void
    {
        $filter = fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === $vatId;
        if (array_any($classifiedTaxCategories, $filter)) {
            $context->buildViolation($rule02)->addViolation();
        }

        if (array_any($this->getAllowanceCharges(), fn(AllowanceChargeType $allowanceCharge) => $allowanceCharge->getChargeIndicator() == Indicator::FALSE &&
            array_any($allowanceCharge->getTaxCategories(), $filter))) {
            $context->buildViolation($rule03)->addViolation();
        }
        if (array_any($this->getAllowanceCharges(), fn(AllowanceChargeType $allowanceCharge) => $allowanceCharge->getChargeIndicator() == Indicator::TRUE &&
            array_any($allowanceCharge->getTaxCategories(), $filter))) {
            $context->buildViolation($rule04)->addViolation();
        }
    }

    /**
     * @param TaxSubtotalType[] $taxSubTotals
     */
    protected function checkTaxableAmount(array $taxSubTotals, ExecutionContextInterface $context, string $vatId, string $rule): void
    {
        foreach ($taxSubTotals as $subTotal) {
            if (is_null($subTotal->getTaxableAmount()?->value)) {
                continue;
            }
            if ($vatId !== $subTotal->getTaxCategory()?->getId()?->value) {
                continue;
            }
            if ('VAT' !== $subTotal->getTaxCategory()?->getTaxScheme()?->getId()?->value) {
                continue;
            }

            $filter = fn(TaxCategoryType $itemTaxCat) => $vatId === $itemTaxCat->getId()?->value;

            $calcTaxAmount = $this->sumInvoiceLines($this->getInvoiceLines(), $filter);
            $calcTaxAmount += $this->sumAllowanceCharges($this->getAllowanceCharges(), $filter);

            if (
                $subTotal->getTaxableAmount()?->value == $calcTaxAmount
            ) {
                continue;
            }
            $context->addViolation($rule);
        }
    }

    /**
     * @param TaxSubtotalType[] $taxSubTotals
     */
    protected function checkTaxableAmountWithPercent(array $taxSubTotals, ExecutionContextInterface $context, string $vatId, string $rule): void
    {
        foreach ($taxSubTotals as $subTotal) {
            if (is_null($subTotal->getTaxableAmount()?->value)) {
                continue;
            }
            if ($vatId !== $subTotal->getTaxCategory()?->getId()?->value) {
                continue;
            }
            if ('VAT' !== $subTotal->getTaxCategory()?->getTaxScheme()?->getId()?->value) {
                continue;
            }
            $taxPercent = $subTotal->getTaxCategory()?->getPercent()?->value;

            $filter = fn(TaxCategoryType $itemTaxCat) => $vatId === $itemTaxCat->getId()?->value
                && $taxPercent === $itemTaxCat->getPercent()?->value;

            $calcTaxAmount = $this->sumInvoiceLines($this->getInvoiceLines(), $filter);
            $calcTaxAmount += $this->sumAllowanceCharges($this->getAllowanceCharges(), $filter);

            if (
                $subTotal->getTaxableAmount()?->value - 1 < $calcTaxAmount &&
                $subTotal->getTaxableAmount()?->value + 1 > $calcTaxAmount
            ) {
                continue;
            }
            $context->addViolation($rule);
        }
    }

    /**
     * @param InvoiceLineType[] $invoiceLines
     * @param callable $filter
     * @return float
     */
    protected function sumInvoiceLines(array $invoiceLines, callable $filter): float
    {
        $sum = 0;
        foreach (array_filter($invoiceLines, fn(InvoiceLineType $invoiceLine) => $invoiceLine->getItem()
            && array_any($invoiceLine->getItem()->getClassifiedTaxCategories(), $filter)
                 ) as $invoiceLine) {
            $sum += $invoiceLine->getLineExtensionAmount()?->value ?? 0;
            //$sum += $this->sumInvoiceLines($invoiceLine->getSubInvoiceLines(), $filter);
        }
        return $sum;
    }

    /**
     * @param AllowanceChargeType[] $allowances
     */
    protected function sumAllowanceCharges(array $allowances, callable $filter): float
    {
        $sum = 0.0;
        foreach ($allowances as $allowance) {
            if (array_any($allowance->getTaxCategories(), $filter)) {
                if ($allowance->getChargeIndicator() == Indicator::TRUE) {
                    $sum += $allowance->getAmount()?->value ?? 0;
                } else {
                    $sum -= $allowance->getAmount()?->value ?? 0;
                }
            }
        }
        return $sum;
    }

    public static function validateInvoicePeriod(PeriodType $period, ExecutionContextInterface $periodContext): void
    {
        if (($period->getStartDate() || $period->getEndDate()) !== empty($period->getDescriptionCodes())) {
            $periodContext->addViolation('BR-CO-19');
        }
        if ($period->getStartDate() && $period->getEndDate()) {
            $periodContext->getValidator()->inContext($periodContext)->validate($period->getEndDate(), [
                new Assert\GreaterThanOrEqual($period->getStartDate(), message: 'BR-29'),
            ]);
        }
    }

    public static function validateAccountingSupplierParty(?SupplierPartyType $supplierParty, ExecutionContextInterface $context): void
    {
        $context->getValidator()->inContext($context)->atPath('party')->validate($supplierParty?->getParty(), [
            new Assert\Callback(self::validateAccountingSupplierPartyParty(...))
        ]);
    }

    public static function validateAccountingSupplierPartyParty(?PartyType $party, ExecutionContextInterface $context): void
    {
        $context->getValidator()->inContext($context)->atPath('postalAddress')->validate($party?->getPostalAddress(), new Assert\Sequentially([
            new Assert\NotNull(message: 'BR-08'),
            new Assert\Callback(callback: function (AddressType $address, ExecutionContextInterface $addressContext) {
                $addressContext->getValidator()->inContext($addressContext)->atPath('country')->validate($address->getCountry()?->identificationCode, [
                    new Assert\NotNull(message: 'BR-09'),
                ]);
                $addressContext->getValidator()->inContext($addressContext)->atPath('cityName')->validate($address->getCityName()?->value, [
                    new Assert\NotBlank(message: 'BR-DE-3', groups: ['XRechnung'])
                ]);
                $addressContext->getValidator()->inContext($addressContext)->atPath('postalZone')->validate($address->getPostalZone()?->value, [
                    new Assert\NotBlank(message: 'BR-DE-4', groups: ['XRechnung'])
                ]);
            }),
        ]));
        $context->getValidator()->inContext($context)->atPath('endpointId')->validate($party?->getEndpointId()?->value, [
            new Assert\NotNull(message: 'PEPPOL-EN16931-R020', groups: ['XRechnung'])
        ]);
        if (is_null($party)) {
            return;
        }
        $context->getValidator()->inContext($context)->atPath('endpointId.schemeID')->validate($party->getEndpointID()?->schemeID, [
            new Assert\NotNull(message: 'BR-62')
        ]);

        $companyIds = array_filter(array_map(
            fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getCompanyID(),
            $party->getPartyTaxSchemes()
        ));
        $context->getValidator()->inContext($context)->validate($companyIds, [
            new Assert\Count(max: 2, maxMessage: 'UBL-SR-42')
        ]);
        $vatCompanyIds = array_filter(array_map(
            fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getCompanyID(),
            array_filter($party->getPartyTaxSchemes(), fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getTaxScheme()?->getId()?->value === 'VAT')
        ));
        $legalCompanyIds = array_filter(array_map(
            fn(PartyLegalEntityType $legalEntity) => $legalEntity->getCompanyID(), $party->getPartyLegalEntities()
        ));
        if (!(!empty($vatCompanyIds) || array_any(
                $party->getPartyIdentifications(),
                fn(PartyIdentificationType $partyIdentification) => !is_null($partyIdentification->id)
            ) || !empty($legalCompanyIds))) {
            $context->buildViolation(
                'BR-CO-26'
            )
                ->setCode('BR-CO-26')
                ->addViolation();
        }
        $registrationNames = array_filter(array_map(
            fn(PartyLegalEntityType $legalEntity) => $legalEntity->getRegistrationName(), $party->getPartyLegalEntities()
        ));
        $context->getValidator()->inContext($context)->validate($registrationNames, [
            new Assert\Count(
                min: 1, max: 1,
                minMessage: 'BR-06',
                maxMessage: 'UBL-SR-09'
            ),
        ]);
        $context->getValidator()->inContext($context)->validate($party->getPartyNames(), [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-10'),
        ]);
        $context->getValidator()->inContext($context)->validate($legalCompanyIds, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-11'),
        ]);

        $context->getValidator()->inContext($context)->validate($vatCompanyIds, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-12'),
        ]);

        $notVatCompanyIds = array_filter(array_map(
            fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getCompanyID(),
            array_filter($party->getPartyTaxSchemes(), fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getTaxScheme()?->getId()?->value !== 'VAT')
        ));
        $context->getValidator()->inContext($context)->validate($notVatCompanyIds, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-13'),
        ]);
        $legalForms = array_filter(array_map(
            fn(PartyLegalEntityType $legalEntity) => $legalEntity->getCompanyLegalForm(), $party->getPartyLegalEntities()
        ));
        $context->getValidator()->inContext($context)->validate($legalForms, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-14'),
        ]);


        $context->getValidator()->inContext($context)->atPath('contact')->validate($party->getContact(), new Assert\Sequentially([
            new Assert\NotNull(message: 'BR-DE-2', groups: ['XRechnung']),
            new Assert\Callback(callback: function (?ContactType $contact, ExecutionContextInterface $contactContext) {
                $contactContext->getValidator()->inContext($contactContext)->atPath('name')->validate($contact->getName()?->value, [
                    new Assert\NotBlank(message: 'BR-DE-5', groups: ['XRechnung'])
                ]);
                $contactContext->getValidator()->inContext($contactContext)->atPath('telephone')->validate($contact->getTelephone()?->value, [
                    new Assert\NotBlank(message: 'BR-DE-6', groups: ['XRechnung']),
                    new Assert\Regex('/.*([0-9].*){3,}.*/', message: 'BR-DE-27', groups: ['XRechnungWarning']),
                ]);
                $contactContext->getValidator()->inContext($contactContext)->atPath('electronicMail')->validate($contact->getElectronicMail()?->value, [
                    new Assert\NotBlank(message: 'BR-DE-7', groups: ['XRechnung']),
                    new Assert\Email(message: 'BR-DE-28', groups: ['XRechnungWarning']),
                ]);

            }, groups: ['XRechnung']),
        ]));
    }

    public static function validateAccountingCustomerParty(?CustomerPartyType $customerParty, ExecutionContextInterface $context): void
    {
        $context->getValidator()->inContext($context)->atPath('party')->validate($customerParty?->getParty(), [
            new Assert\Callback(self::validateAccountingCustomerPartyParty(...))
        ]);
    }
    public static function validateAccountingCustomerPartyParty(?PartyType $party, ExecutionContextInterface $context): void
    {
        $context->getValidator()->inContext($context)->atPath('postalAddress')->validate($party?->getPostalAddress(), new Assert\Sequentially([
            new Assert\NotNull(message: 'BR-10'),
            new Assert\Callback(callback: function (AddressType $address, ExecutionContextInterface $addressContext) {
                $addressContext->getValidator()->inContext($addressContext)->atPath('country')->validate($address->getCountry()?->identificationCode, [
                    new Assert\NotNull(message: 'BR-11'),
                ]);

                $addressContext->getValidator()->inContext($addressContext)->atPath('cityName')->validate($address->getCityName()?->value, [
                    new Assert\NotBlank(message: 'BR-DE-8', groups: ['XRechnung'])
                ]);
                $addressContext->getValidator()->inContext($addressContext)->atPath('postalZone')->validate($address->getPostalZone()?->value, [
                    new Assert\NotBlank(message: 'BR-DE-9', groups: ['XRechnung'])
                ]);
            }),
        ]));

        $context->getValidator()->inContext($context)->atPath('endpointId')->validate($party?->getEndpointId()?->value, [
            new Assert\NotNull(message: 'PEPPOL-EN16931-R010', groups: ['XRechnung'])
        ]);
        if (is_null($party)) {
            return;
        }
        $context->getValidator()->inContext($context)->atPath('endpointId.schemeID')->validate($party->getEndpointID()?->schemeID, [
            new Assert\NotNull(message: 'BR-63')
        ]);

        $registrationNames = array_filter(array_map(
            fn(PartyLegalEntityType $legalEntity) => $legalEntity->getRegistrationName(), $party->getPartyLegalEntities()
        ));

        $context->getValidator()->inContext($context)->validate($registrationNames, [
            new Assert\Count(
                min: 1, max: 1,
                minMessage: 'BR-07',
                maxMessage: 'UBL-SR-15'
            ),
        ]);

        $partyIdentifications = array_map(
            fn(PartyIdentificationType $identification) => $identification->id, $party->getPartyIdentifications()
        );
        $context->getValidator()->inContext($context)->atPath('partyIdentifications')->validate($partyIdentifications, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-16'),
        ]);

        $legalCompanyIds = array_filter(array_map(
            fn(PartyLegalEntityType $legalEntity) => $legalEntity->getCompanyID(), $party->getPartyLegalEntities()
        ));
        $context->getValidator()->inContext($context)->validate($legalCompanyIds, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-17'),
        ]);
        $vatCompanyIds = array_map(
            fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getCompanyID(),
            array_filter($party->getPartyTaxSchemes(), fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getTaxScheme()?->getId()?->value === 'VAT')
        );
        $context->getValidator()->inContext($context)->validate($vatCompanyIds, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-18'),
        ]);

        $partyNames = array_map(
            fn(PartyNameType $partyName) => $partyName->name,
            $party->getPartyNames()
        );

        $context->getValidator()->inContext($context)->validate($partyNames, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-40'),
        ]);
    }

    public static function validateTaxRepresentativeParty(?PartyType $party, ExecutionContextInterface $context): void
    {
        if (is_null($party)) {
            return;
        }

        $context->getValidator()->inContext($context)->atPath('partyNames')->validate($party->getPartyNames(), [
            new Assert\Count(
                min: 1,
                max: 1,
                minMessage: 'BR-18',
                maxMessage: 'UBL-SR-22'
            ),
        ]);

        $taxPartyCompanyIds = array_filter(array_map(
            fn(PartyTaxSchemeType $partyTaxScheme) => $partyTaxScheme->getCompanyID(),
            $party->getPartyTaxSchemes()
        ));
        $context->getValidator()->inContext($context)->atPath('partyTaxSchemes')->validate($taxPartyCompanyIds, [
            new Assert\Count(max: 1, maxMessage: 'UBL-SR-23'),
        ]);
        $vatCompanyIds = array_filter(array_map(
            fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getCompanyID(),
            array_filter($party->getPartyTaxSchemes(), fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getTaxScheme()?->getId()?->value === 'VAT')
        ));
        $context->getValidator()->inContext($context)->atPath('partyTaxSchemes')->validate($vatCompanyIds, [
            new Assert\Count(min: 1, minMessage: 'BR-56'),
        ]);

        $context->getValidator()->inContext($context)->atPath('postalAddress')->validate($party->getPostalAddress(), new Assert\Sequentially([
            new Assert\NotNull(message: 'BR-19'),
            new Assert\Callback(callback: fn(?AddressType $address, ExecutionContextInterface $addressContext) =>
            $addressContext->getValidator()->inContext($addressContext)->atPath('country')->validate($address?->getCountry()?->identificationCode, [
                new Assert\NotNull(message: 'BR-20'),
            ])
            )
        ]));
    }

    public static function validateAllowanceCharge(AllowanceChargeType $allowanceCharge, ExecutionContextInterface $context): void
    {
        $indi = $allowanceCharge->getChargeIndicator() === Indicator::TRUE;
        $context->getValidator()->inContext($context)->atPath('amount')->validate($allowanceCharge->getAmount(), [
            new Assert\NotNull(message: $indi ? 'BR-36' : 'BR-31')
        ]);

        $anyTaxVat = array_any($allowanceCharge->getTaxCategories(),
            fn(TaxCategoryType $taxCategory) => $taxCategory->getTaxScheme()?->getId()?->value === 'VAT' && $taxCategory->getId()
        );
        if (!$anyTaxVat) {
            $context->buildViolation($indi ? 'BR-37' : 'BR-32')->atPath('taxCategories')->addViolation();
        }
        $context->getValidator()->inContext($context)->atPath('taxCategories')->validate($allowanceCharge->getTaxCategories(), [
            new Assert\All([
                new Assert\Callback(Invoice::validateAllowanceChargeTaxCategory(...), payload: $allowanceCharge),
            ])
        ]);
        if (!$allowanceCharge->getAllowanceChargeReasonCode() && empty($allowanceCharge->getAllowanceChargeReasons())) {
            $context->buildViolation($indi ? 'BR-38' : 'BR-33')->atPath('allowanceChargeReasonCode')->addViolation();
        }
        $context->getValidator()->inContext($context)->atPath('allowanceChargeReasons')->validate($allowanceCharge->getAllowanceChargeReasons(), [
            new Assert\Count(max: 1, maxMessage: $indi ? 'UBL-SR-31' : 'UBL-SR-30')
        ]);

        if ($allowanceCharge->getMultiplierFactorNumeric()) {
            $context->getValidator()->inContext($context)->atPath('baseAmount')->validate($allowanceCharge->getBaseAmount(), [
                new Assert\NotNull(message: 'PEPPOL-EN16931-R041', groups: ['XRechnung'])
            ]);
        }
        if ($allowanceCharge->getBaseAmount()) {
            $context->getValidator()->inContext($context)->atPath('multiplierFactorNumeric')->validate($allowanceCharge->getMultiplierFactorNumeric(), [
                new Assert\NotNull(message: 'PEPPOL-EN16931-R042', groups: ['XRechnung'])
            ]);
        }
    }
    public static function validateAllowanceChargeTaxCategory(TaxCategoryType $taxCategory, ExecutionContextInterface $context, AllowanceChargeType $payload): void
    {
        if ($taxCategory->getTaxScheme()?->getId()?->value !== 'VAT') {
            return;
        }
        $percentContext = $context->getValidator()->inContext($context)->atPath('percent');

        $indi = $payload->getChargeIndicator() == Indicator::TRUE;
        switch (TaxCategoryCode::tryFrom($taxCategory->getId()->value)) {
            case TaxCategoryCode::S:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\Positive(message: $indi ? 'BR-S-07' : 'BR-S-06')
                ]);
                break;
            case TaxCategoryCode::AE:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: $indi ? 'BR-AE-07' : 'BR-AE-06')
                ]);
                break;
            case TaxCategoryCode::E:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: $indi ? 'BR-E-07' : 'BR-E-06')
                ]);
                break;
            case TaxCategoryCode::Z:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: $indi ? 'BR-Z-07' : 'BR-Z-06')
                ]);
                break;
            case TaxCategoryCode::G:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: $indi ? 'BR-G-07' : 'BR-G-06')
                ]);
                break;
            case TaxCategoryCode::O:
                $percentContext->validate($taxCategory->getPercent(), [
                    new Assert\IsNull(message: $indi ? 'BR-O-07' : 'BR-O-06')
                ]);
                break;
            case TaxCategoryCode::K:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\EqualTo(0, message: $indi ? 'BR-IC-07' : 'BR-IC-06')
                ]);
                break;
            case TaxCategoryCode::L:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\PositiveOrZero(message: $indi ? 'BR-AF-07' : 'BR-AF-06')
                ]);
                break;
            case TaxCategoryCode::M:
                $percentContext->validate($taxCategory->getPercent()?->value, [
                    new Assert\PositiveOrZero(message: $indi ? 'BR-AG-07' : 'BR-AG-06')
                ]);
                break;
            case TaxCategoryCode::B:
                break;
            default:
                $context->buildViolation('BR-CL-17')->atPath('id')->addViolation();
        }
    }
}