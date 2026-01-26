<?php /** @noinspection PhpUnused */

namespace UBL;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
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
        #[Assert\NotNull(message: '[BR-01]-An Invoice shall have a Specification identifier (BT-24).')]
        #[SerializedName("CustomizationID")]
        protected ?IdentifierType     $customizationID = null,
        #[SerializedName("ProfileID")]
        protected ?IdentifierType     $profileID = null,
        #[SerializedName("ProfileExecutionID")]
        protected ?IdentifierType     $profileExecutionID = null,
        #[Assert\NotNull(message: '[BR-02]-An Invoice shall have an Invoice number (BT-1).')]
        #[SerializedName("ID")]
        protected ?IdentifierType     $id = null,
        #[SerializedName("CopyIndicator")]
        protected ?Indicator          $copyIndicator = null,
        #[SerializedName("UUID")]
        protected ?IdentifierType     $uUID = null,
        #[Assert\NotNull(message: '[BR-03]-An Invoice shall have an Invoice issue date (BT-2).')]
        #[SerializedName("IssueDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface  $issueDate = null,
        #[SerializedName("IssueTime")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface  $issueTime = null,
        #[SerializedName("DueDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface  $dueDate = null,
        #[Assert\NotNull(message: '[BR-04]-An Invoice shall have an Invoice type code (BT-3).')]
        #[SerializedName("InvoiceTypeCode")]
        protected ?CodeType           $invoiceTypeCode = null,
        #[SerializedName("Note")]
        protected array               $notes = [],
        #[SerializedName("TaxPointDate")]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface  $taxPointDate = null,
        #[Assert\NotNull(message: '[BR-05]-An Invoice shall have an Invoice currency code (BT-5).')]
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
        #[SerializedName("BuyerReference")]
        protected ?TextType           $buyerReference = null,
        #[SerializedName("InvoicePeriod")]
        protected array               $invoicePeriods = [],
        #[SerializedName("OrderReference")]
        protected ?OrderReferenceType $orderReference = null,
        #[SerializedName("BillingReference")]
        protected array               $billingReferences = [],
        #[SerializedName("DespatchDocumentReference")]
        protected array               $despatchDocumentReferences = [],
        #[SerializedName("ReceiptDocumentReference")]
        protected array               $receiptDocumentReferences = [],
        #[SerializedName("StatementDocumentReference")]
        protected array               $statementDocumentReferences = [],
        #[SerializedName("OriginatorDocumentReference")]
        protected array               $originatorDocumentReferences = [],
        #[SerializedName("ContractDocumentReference")]
        protected array               $contractDocumentReferences = [],
        #[SerializedName("AdditionalDocumentReference")]
        protected array               $additionalDocumentReferences = [],
        #[SerializedName("ProjectReference")]
        protected array               $projectReferences = [],
        #[SerializedName("Signature")]
        protected array               $signatures = [],
        #[Assert\Valid]
        #[Assert\Sequentially([
            new Assert\Expression('value?.getParty()?.getPostalAddress()', message: '[BR-08]-An Invoice shall contain the Seller postal address.'),
            new Assert\Expression('value.getParty().getPostalAddress()?.getCountry()?.identificationCode', message: '[BR-09]-The Seller postal address (BG-5) shall contain a Seller country code (BT-40).'),
            new Assert\Expression('value.getParty().getEndpointID()', 'Seller electronic address MUST be provided'),
            new Assert\Expression('value.getParty().getEndpointID().schemeID', '[BR-62]-The Seller electronic address (BT-34) shall have a Scheme identifier.'),
        ])]
        #[SerializedName("AccountingSupplierParty")]
        protected ?SupplierPartyType  $accountingSupplierParty = null,
        #[Assert\Valid]
        #[Assert\Sequentially([
            new Assert\Expression('value?.getParty()?.getPostalAddress()', '[BR-10]-An Invoice shall contain the Buyer postal address (BG-8).'),
            new Assert\Expression('value.getParty().getPostalAddress()?.getCountry()?.identificationCode', '[BR-11]-The Buyer postal address shall contain a Buyer country code (BT-55).'),
            new Assert\Expression('value.getParty().getEndpointID()', 'Buyer electronic address MUST be provided'),
            new Assert\Expression('value.getParty().getEndpointID().schemeID', '[BR-63]-The Buyer electronic address (BT-49) shall have a Scheme identifier.'),
        ])]
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
        #[Assert\When('value', [
            new Assert\Expression('value.getPostalAddress()?.getCountry()?.identificationCode', message: '[BR-20]-The Seller tax representative postal address (BG-12) shall contain a Tax representative country code (BT-69), if the Seller (BG-4) has a Seller tax representative party (BG-11).'),
        ])]
        #[SerializedName("TaxRepresentativeParty")]
        protected ?PartyType          $taxRepresentativeParty = null,
        #[SerializedName("Delivery")]
        protected array               $deliveries = [],
        #[SerializedName("DeliveryTerms")]
        protected ?DeliveryTermsType  $deliveryTerms = null,
        #[Assert\Valid]
        #[SerializedName("PaymentMeans")]
        protected array               $paymentMeans = [],
        #[SerializedName("PaymentTerms")]
        protected array               $paymentTerms = [],
        #[SerializedName("PrepaidPayment")]
        protected array               $prepaidPayments = [],
        #[Assert\Valid]
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
            min: 1,
            minMessage: "[BR-16]-An Invoice shall have at least one Invoice line (BG-25)"
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
        $context->getValidator()->inContext($context)->validate($this->getDocumentCurrencyCode()?->value, [
            new Assert\Currency(message: '[BR-CL-04]-Invoice currency code MUST be coded using ISO code list 4217 alpha-3')
        ]);
        $context->getValidator()->inContext($context)->validate($this->getTaxCurrencyCode()?->value, [
            new Assert\Currency(message: '[BR-CL-05]-Tax currency code MUST be coded using ISO code list 4217 alpha-3')
        ]);

        if ($supplierPartyParty = $this->getAccountingSupplierParty()?->getParty()) {
            if (!(array_any(
                    $supplierPartyParty->getPartyTaxSchemes(),
                    fn(PartyTaxSchemeType $partyTaxScheme) => $partyTaxScheme->getTaxScheme()?->getId()?->value === 'VAT' && !is_null($partyTaxScheme->getCompanyID())
                ) || array_any(
                    $supplierPartyParty->getPartyIdentifications(),
                    fn(PartyIdentificationType $partyIdentification) => !is_null($partyIdentification->id)
                ) || array_any(
                    $supplierPartyParty->getPartyLegalEntities(),
                    fn(PartyLegalEntityType $partyLegalEntity) => !is_null($partyLegalEntity->getCompanyID())
                ))) {
                $context->buildViolation(
                    '[BR-CO-26]-In order for the buyer to automatically identify a supplier, the Seller identifier (BT-29), the Seller legal registration identifier (BT-30) and/or the Seller VAT identifier (BT-31) shall be present.'
                )
                    ->setCode('BR-CO-26')
                    ->atPath('accounting_supplier_party.party')
                    ->addViolation();
            }
            $registrationNames = array_filter(array_map(
                fn(PartyLegalEntityType $legalEntity) => $legalEntity->getRegistrationName(), $supplierPartyParty->getPartyLegalEntities()
            ));
            $context->getValidator()->inContext($context)->validate($registrationNames, [
                new Assert\Count(
                    min: 1, max: 1,
                    minMessage: '[BR-06]-An Invoice shall contain the Seller name (BT-27).',
                    maxMessage: '[UBL-SR-09]-Seller name shall occur maximum once'
                ),
            ]);
            $context->getValidator()->inContext($context)->validate($supplierPartyParty->getPartyNames(), [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-10]-Seller trader name shall occur maximum once'),
            ]);
            $legalCompanyIds = array_filter(array_map(
                fn(PartyLegalEntityType $legalEntity) => $legalEntity->getCompanyID(), $supplierPartyParty->getPartyLegalEntities()
            ));
            $context->getValidator()->inContext($context)->validate($legalCompanyIds, [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-11]-Seller legal registration identifier shall occur maximum once'),
            ]);

            $vatCompanyIds = array_map(
                fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getCompanyID(),
                array_filter($supplierPartyParty->getPartyTaxSchemes(), fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getTaxScheme()?->getId()?->value === 'VAT')
            );
            $context->getValidator()->inContext($context)->validate($vatCompanyIds, [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-12]-Seller VAT identifier shall occur maximum once'),
            ]);

            $notVatCompanyIds = array_map(
                fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getCompanyID(),
                array_filter($supplierPartyParty->getPartyTaxSchemes(), fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getTaxScheme()?->getId()?->value !== 'VAT')
            );
            $context->getValidator()->inContext($context)->validate($notVatCompanyIds, [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-13]-Seller tax registration shall occur maximum once'),
            ]);
        }

        if ($customerPartyParty = $this->getAccountingCustomerParty()?->getParty()) {
            $registrationNames = array_filter(array_map(
                fn(PartyLegalEntityType $legalEntity) => $legalEntity->getRegistrationName(), $customerPartyParty->getPartyLegalEntities()
            ));

            $context->getValidator()->inContext($context)->validate($registrationNames, [
                new Assert\Count(
                    min: 1, max: 1,
                    minMessage: '[BR-07]-An Invoice shall contain the Buyer name (BT-44).',
                    maxMessage: '[UBL-SR-15]-Buyer name shall occur maximum once'
                ),
            ]);

            $partyIdentifications = array_map(
                fn(PartyIdentificationType $identification) => $identification->id, $customerPartyParty->getPartyIdentifications()
            );
            $context->getValidator()->inContext($context)->validate($partyIdentifications, [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-16]-Buyer identifier shall occur maximum once'),
            ]);

            $legalCompanyIds = array_filter(array_map(
                fn(PartyLegalEntityType $legalEntity) => $legalEntity->getCompanyID(), $customerPartyParty->getPartyLegalEntities()
            ));
            $context->getValidator()->inContext($context)->validate($legalCompanyIds, [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-17]-Buyer legal registration identifier shall occur maximum once'),
            ]);
            $vatCompanyIds = array_map(
                fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getCompanyID(),
                array_filter($supplierPartyParty->getPartyTaxSchemes(), fn(PartyTaxSchemeType $taxScheme) => $taxScheme->getTaxScheme()?->getId()?->value === 'VAT')
            );
            $context->getValidator()->inContext($context)->validate($vatCompanyIds, [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-18]-Buyer VAT identifier shall occur maximum once'),
            ]);

            $partyNames = array_map(
                fn(PartyNameType $partyName) => $partyName->name,
                $customerPartyParty->getPartyNames()
            );

            $context->getValidator()->inContext($context)->validate($partyNames, [
                new Assert\Count(max: 1, maxMessage: '[UBL-SR-40]-Buyer trade name shall occur maximum once'),
            ]);
        }

        if ($taxParty = $this->getTaxRepresentativeParty()) {
            $context->getValidator()->inContext($context)->validate($taxParty->getPartyNames(), [
                new Assert\Count(
                    min: 1,
                    max: 1,
                    minMessage: '[BR-18]-The Seller tax representative name (BT-62) shall be provided in the Invoice, if the Seller (BG-4) has a Seller tax representative party (BG-11)',
                    maxMessage: '[UBL-SR-22]-Seller tax representative name shall occur maximum once, if the Seller has a tax representative'
                ),
            ]);
        }

        $hasTaxSchemeParty = false;
        if ($supplierPartyParty) {
            $hasTaxSchemeParty = array_any($supplierPartyParty->getPartyTaxSchemes(), fn(PartyTaxSchemeType $partyTaxScheme) => $partyTaxScheme->getCompanyID());
        }
        if (!$hasTaxSchemeParty && $taxParty) {
            $hasTaxSchemeParty = array_any($taxParty->getPartyTaxSchemes(), fn(PartyTaxSchemeType $partyTaxScheme) => $partyTaxScheme->getTaxScheme()->getId() === 'VAT' && $partyTaxScheme->getCompanyID());
        }

        /**
         * @var $taxSubTotals TaxSubtotalType[]
         */
        $taxSubTotals = [];
        foreach ($this->getTaxTotals() as $taxTotal) {
            array_push($taxSubTotals, ...$taxTotal->getTaxSubtotals());
        }
        $context->getValidator()->inContext($context)->validate($taxSubTotals, [
            new Assert\Count(
                min: 1,
                minMessage: '[BR-CO-18]-An Invoice shall at least have one VAT breakdown group (BG-23).'
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

            $indi = $allowanceCharge->getChargeIndicator() === Indicator::TRUE;
            $context->getValidator()->inContext($context)->validate($allowanceCharge->getAmount(), [
                new Assert\NotNull(message: $indi ?
                    '[BR-36]-Each Document level charge (BG-21) shall have a Document level charge amount (BT-99).' :
                    '[BR-31]-Each Document level allowance (BG-20) shall have a Document level allowance amount (BT-92).')
            ]);

            $anyTaxVat = array_any($allowanceCharge->getTaxCategories(), fn(TaxCategoryType $taxCategory) => $taxCategory->getTaxScheme()->getId() === 'VAT' && $taxCategory->getId());
            if (!$anyTaxVat) {
                $context->addViolation($indi ?
                    '[BR-37]-Each Document level charge (BG-21) shall have a Document level charge VAT category code (BT-102).' :
                    '[BR-32]-Each Document level allowance (BG-20) shall have a Document level allowance VAT category code (BT-95).'
                );
            }
            if (!$allowanceCharge->getAllowanceChargeReasonCode() && empty($allowanceCharge->getAllowanceChargeReasons())) {
                $context->addViolation($indi ?
                    '[BR-38]-Each Document level charge (BG-21) shall have a Document level charge reason (BT-104) or a Document level charge reason code (BT-105).' :
                    '[BR-33]-Each Document level allowance (BG-20) shall have a Document level allowance reason (BT-97) or a Document level allowance reason code (BT-98).'
                );
            }
        }


        $this->validateByVatCategoryRule01($taxSubTotals, $classifiedTaxCategories, $allowanceTaxCategories, $context, 'E',
            '[BR-E-01]-An Invoice that contains an Invoice line (BG-25), a Document level allowance (BG-20) or a Document level charge (BG-21) where the VAT category code (BT-151, BT-95 or BT-102) is "Exempt from VAT" shall contain exactly one VAT breakdown (BG-23) with the VAT category code (BT-118) equal to "Exempt from VAT".'
        );
        if (!$hasTaxSchemeParty) {
            $this->validateByVatCategoryRules($classifiedTaxCategories, $context, 'E',
                rule02: '[BR-E-02]-An Invoice that contains an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "Exempt from VAT" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).',
                rule03: '[BR-E-03]-An Invoice that contains a Document level allowance (BG-20) where the Document level allowance VAT category code (BT-95) is "Exempt from VAT" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).',
                rule04: '[BR-E-04]-An Invoice that contains a Document level charge (BG-21) where the Document level charge VAT category code (BT-102) is "Exempt from VAT" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).');
        }
        $this->validateVatCategoryAllowancePercent($context, 'value = 0', 'E',
            '[BR-E-06]-In a Document level allowance (BG-20) where the Document level allowance VAT category code (BT-95) is "Exempt from VAT", the Document level allowance VAT rate (BT-96) shall be 0 (zero).',
            '[BR-E-07]-In a Document level charge (BG-21) where the Document level charge VAT category code (BT-102) is "Exempt from VAT", the Document level charge VAT rate (BT-103) shall be 0 (zero).'
        );

        if (array_any($taxSubTotals, fn(TaxSubtotalType $subtotal) => $subtotal->getTaxCategory()->getId()->value === 'S') !== (
                array_any($classifiedTaxCategories, fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === 'S') ||
                array_any($allowanceTaxCategories, fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === 'S')
            )) {
            $context->buildViolation(
                '[BR-S-01]-An Invoice that contains an Invoice line (BG-25), a Document level allowance (BG-20) or a Document level charge (BG-21) where the VAT category code (BT-151, BT-95 or BT-102) is "Standard rated" shall contain in the VAT breakdown (BG-23) at least one VAT category code (BT-118) equal with "Standard rated".'
            )
                ->setCode('BR-S-01')
                ->addViolation();
        }
        if (!$hasTaxSchemeParty) {
            $this->validateByVatCategoryRules($classifiedTaxCategories, $context, 'S',
                '[BR-S-02]-An Invoice that contains an Invoice line (BG-25) where the Invoiced item VAT category code (BT-151) is "Standard rated" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).',
                '[BR-S-03]-An Invoice that contains a Document level allowance (BG-20) where the Document level allowance VAT category code (BT-95) is "Standard rated" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).',
                '[BR-S-04]-An Invoice that contains a Document level charge (BG-21) where the Document level charge VAT category code (BT-102) is "Standard rated" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).'
            );
        }
        $this->validateVatCategoryAllowancePercent($context, 'value > 0', 'S',
            '[BR-S-06]-In a Document level allowance (BG-20) where the Document level allowance VAT category code (BT-95) is "Standard rated" the Document level allowance VAT rate (BT-96) shall be greater than zero.',
            '[BR-S-07]-In a Document level charge (BG-21) where the Document level charge VAT category code (BT-102) is "Standard rated" the Document level charge VAT rate (BT-103) shall be greater than zero.'
        );
        $this->checkTaxableAmountWithPercent($taxSubTotals, $context, 'S', '[BR-S-08]-For each different value of VAT category rate (BT-119) where the VAT category code (BT-118) is "Standard rated", the VAT category taxable amount (BT-116) in a VAT breakdown (BG-23) shall equal the sum of Invoice line net amounts (BT-131) plus the sum of document level charge amounts (BT-99) minus the sum of document level allowance amounts (BT-92) where the VAT category code (BT-151, BT-102, BT-95) is "Standard rated" and the VAT rate (BT-152, BT-103, BT-96) equals the VAT category rate (BT-119).');

        $this->validateByVatCategoryRule01($taxSubTotals, $classifiedTaxCategories, $allowanceTaxCategories, $context, 'Z',
            '[BR-Z-01]-An Invoice that contains an Invoice line (BG-25), a Document level allowance (BG-20) or a Document level charge (BG-21) where the VAT category code (BT-151, BT-95 or BT-102) is "Zero rated" shall contain in the VAT breakdown (BG-23) exactly one VAT category code (BT-118) equal with "Zero rated".'
        );
        if (!$hasTaxSchemeParty) {
            $this->validateByVatCategoryRules($classifiedTaxCategories, $context, 'Z',
                rule02: '[BR-Z-02]-An Invoice that contains an Invoice line where the Invoiced item VAT category code (BT-151) is "Zero rated" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).',
                rule03: '[BR-Z-03]-An Invoice that contains a Document level allowance (BG-20) where the Document level allowance VAT category code (BT-95) is "Zero rated" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).',
                rule04: '[BR-Z-04]-An Invoice that contains a Document level charge where the Document level charge VAT category code (BT-102) is "Zero rated" shall contain the Seller VAT Identifier (BT-31), the Seller tax registration identifier (BT-32) and/or the Seller tax representative VAT identifier (BT-63).');
        }
        $this->validateVatCategoryAllowancePercent($context, 'value = 0', 'Z',
            '[BR-Z-06]-In a Document level allowance (BG-20) where the Document level allowance VAT category code (BT-95) is "Zero rated" the Document level allowance VAT rate (BT-96) shall be 0 (zero).',
            '[BR-Z-07]-In a Document level charge (BG-21) where the Document level charge VAT category code (BT-102) is "Zero rated" the Document level charge VAT rate (BT-103) shall be 0 (zero).'
        );
        $this->checkTaxableAmount($taxSubTotals, $context, 'Z', '[BR-Z-08]-In a VAT breakdown (BG-23) where VAT category code (BT-118) is "Zero rated" the VAT category taxable amount (BT-116) shall equal the sum of Invoice line net amount (BT-131) minus the sum of Document level allowance amounts (BT-92) plus the sum of Document level charge amounts (BT-99) where the VAT category codes (BT-151, BT-95, BT-102) are "Zero rated".');
    }

    protected function validateByVatCategoryRule01(
        array                     $taxSubTotals, array $classifiedTaxCategories, array $allowanceTaxCategories,
        ExecutionContextInterface $context, string $vatId, string $rule01): void
    {

        if ((count(array_filter($taxSubTotals, fn(TaxSubtotalType $subtotal) => $subtotal->getTaxCategory()->getId()->value === $vatId)) == 1) !== (
                array_any($classifiedTaxCategories, fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === $vatId) ||
                array_any($allowanceTaxCategories, fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === $vatId)
            )) {
            $context->buildViolation($rule01)->addViolation();
        }
    }

    protected function validateByVatCategoryRules(
        array $classifiedTaxCategories, ExecutionContextInterface $context, string $vatId, string $rule02, string $rule03, string $rule04): void
    {
        if (array_any($classifiedTaxCategories, fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === $vatId)) {
            $context->buildViolation($rule02)->addViolation();
        }

        if (array_any($this->getAllowanceCharges(), fn(AllowanceChargeType $allowanceCharge) => $allowanceCharge->getChargeIndicator() == Indicator::FALSE &&
            array_any($allowanceCharge->getTaxCategories(), fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === $vatId))) {
            $context->buildViolation($rule03)->addViolation();
        }
        if (array_any($this->getAllowanceCharges(), fn(AllowanceChargeType $allowanceCharge) => $allowanceCharge->getChargeIndicator() == Indicator::TRUE &&
            array_any($allowanceCharge->getTaxCategories(), fn(TaxCategoryType $taxCategory) => $taxCategory->getId()->value === $vatId))) {
            $context->buildViolation($rule04)->addViolation();
        }
    }

    protected function validateVatCategoryAllowancePercent(ExecutionContextInterface $context, string $expr, string $vatId, string $rule06, string $rule07): void
    {
        foreach ($this->getAllowanceCharges() as $allowanceCharge) {
            foreach ($allowanceCharge->getTaxCategories() as $taxCategory) {
                if ($taxCategory->getId()?->value !== $vatId) {
                    continue;
                }
                $context->getValidator()->inContext($context)->validate($taxCategory->getPercent()?->value, [
                    new Assert\Expression($expr, message: $allowanceCharge->getChargeIndicator() === Indicator::TRUE ? $rule07 : $rule06),
                ]);
            }
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
            $sum += $this->sumInvoiceLines($invoiceLine->getSubInvoiceLines(), $filter);
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
}