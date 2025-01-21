<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class ConsignmentType
{
    /**
     * @param TextType[] $summaryDescriptions
     * @param TextType[] $tariffDescriptions
     * @param TextType[] $remarks
     * @param TextType[] $carrierServiceInstructions
     * @param TextType[] $customsClearanceServiceInstructions
     * @param TextType[] $forwarderServiceInstructions
     * @param TextType[] $specialServiceInstructions
     * @param TextType[] $handlingInstructions
     * @param TextType[] $information
     * @param TextType[] $specialInstructions
     * @param TextType[] $deliveryInstructions
     * @param TextType[] $haulageInstructions
     * @param ShipmentType[] $consolidatedShipments
     * @param CustomsDeclarationType[] $customsDeclarations
     * @param StatusType[] $status
     * @param ConsignmentType[] $childConsignments
     * @param CountryType[] $transitCountries
     * @param TransportEventType[] $transportEvents
     * @param AllowanceChargeType[] $freightAllowanceCharges
     * @param AllowanceChargeType[] $extraAllowanceCharges
     * @param ShipmentStageType[] $mainCarriageShipmentStages
     * @param ShipmentStageType[] $preCarriageShipmentStages
     * @param ShipmentStageType[] $onCarriageShipmentStages
     * @param TransportHandlingUnitType[] $transportHandlingUnits
     */
    public function __construct(
        #[SerializedName("ID")]
        protected ?IdentifierType $id = null,
        #[SerializedName("CarrierAssignedID")]
        protected ?IdentifierType $carrierAssignedID = null,
        #[SerializedName("ConsigneeAssignedID")]
        protected ?IdentifierType $consigneeAssignedID = null,
        #[SerializedName("ConsignorAssignedID")]
        protected ?IdentifierType $consignorAssignedID = null,
        #[SerializedName("FreightForwarderAssignedID")]
        protected ?IdentifierType $freightForwarderAssignedID = null,
        #[SerializedName("BrokerAssignedID")]
        protected ?IdentifierType $brokerAssignedID = null,
        #[SerializedName("ContractedCarrierAssignedID")]
        protected ?IdentifierType $contractedCarrierAssignedID = null,
        #[SerializedName("PerformingCarrierAssignedID")]
        protected ?IdentifierType $performingCarrierAssignedID = null,
        #[SerializedName("SummaryDescription")]
        protected array $summaryDescriptions = [],
        #[SerializedName("TotalInvoiceAmount")]
        protected ?AmountType $totalInvoiceAmount = null,
        #[SerializedName("DeclaredCustomsValueAmount")]
        protected ?AmountType $declaredCustomsValueAmount = null,
        #[SerializedName("TariffDescription")]
        protected array $tariffDescriptions = [],
        #[SerializedName("TariffCode")]
        protected ?CodeType $tariffCode = null,
        #[SerializedName("InsurancePremiumAmount")]
        protected ?AmountType $insurancePremiumAmount = null,
        #[SerializedName("GrossWeightMeasure")]
        protected ?MeasureType $grossWeightMeasure = null,
        #[SerializedName("NetWeightMeasure")]
        protected ?MeasureType $netWeightMeasure = null,
        #[SerializedName("NetNetWeightMeasure")]
        protected ?MeasureType $netNetWeightMeasure = null,
        #[SerializedName("ChargeableWeightMeasure")]
        protected ?MeasureType $chargeableWeightMeasure = null,
        #[SerializedName("GrossVolumeMeasure")]
        protected ?MeasureType $grossVolumeMeasure = null,
        #[SerializedName("NetVolumeMeasure")]
        protected ?MeasureType $netVolumeMeasure = null,
        #[SerializedName("LoadingLengthMeasure")]
        protected ?MeasureType $loadingLengthMeasure = null,
        #[SerializedName("Remarks")]
        protected array $remarks = [],
        #[SerializedName("HazardousRiskIndicator")]
        protected ?Indicator $hazardousRiskIndicator = null,
        #[SerializedName("AnimalFoodIndicator")]
        protected ?Indicator $animalFoodIndicator = null,
        #[SerializedName("HumanFoodIndicator")]
        protected ?Indicator $humanFoodIndicator = null,
        #[SerializedName("LivestockIndicator")]
        protected ?Indicator $livestockIndicator = null,
        #[SerializedName("BulkCargoIndicator")]
        protected ?Indicator $bulkCargoIndicator = null,
        #[SerializedName("ContainerizedIndicator")]
        protected ?Indicator $containerizedIndicator = null,
        #[SerializedName("GeneralCargoIndicator")]
        protected ?Indicator $generalCargoIndicator = null,
        #[SerializedName("SpecialSecurityIndicator")]
        protected ?Indicator $specialSecurityIndicator = null,
        #[SerializedName("ThirdPartyPayerIndicator")]
        protected ?Indicator $thirdPartyPayerIndicator = null,
        #[SerializedName("CarrierServiceInstructions")]
        protected array $carrierServiceInstructions = [],
        #[SerializedName("CustomsClearanceServiceInstructions")]
        protected array $customsClearanceServiceInstructions = [],
        #[SerializedName("ForwarderServiceInstructions")]
        protected array $forwarderServiceInstructions = [],
        #[SerializedName("SpecialServiceInstructions")]
        protected array $specialServiceInstructions = [],
        #[SerializedName("SequenceID")]
        protected ?IdentifierType $sequenceID = null,
        #[SerializedName("ShippingPriorityLevelCode")]
        protected ?CodeType $shippingPriorityLevelCode = null,
        #[SerializedName("HandlingCode")]
        protected ?CodeType $handlingCode = null,
        #[SerializedName("HandlingInstructions")]
        protected array $handlingInstructions = [],
        #[SerializedName("Information")]
        protected array $information = [],
        #[SerializedName("TotalGoodsItemQuantity")]
        protected ?QuantityType $totalGoodsItemQuantity = null,
        #[SerializedName("TotalTransportHandlingUnitQuantity")]
        protected ?QuantityType $totalTransportHandlingUnitQuantity = null,
        #[SerializedName("InsuranceValueAmount")]
        protected ?AmountType $insuranceValueAmount = null,
        #[SerializedName("DeclaredForCarriageValueAmount")]
        protected ?AmountType $declaredForCarriageValueAmount = null,
        #[SerializedName("DeclaredStatisticsValueAmount")]
        protected ?AmountType $declaredStatisticsValueAmount = null,
        #[SerializedName("FreeOnBoardValueAmount")]
        protected ?AmountType $freeOnBoardValueAmount = null,
        #[SerializedName("SpecialInstructions")]
        protected array $specialInstructions = [],
        #[SerializedName("SplitConsignmentIndicator")]
        protected ?Indicator $splitConsignmentIndicator = null,
        #[SerializedName("DeliveryInstructions")]
        protected array $deliveryInstructions = [],
        #[SerializedName("ConsignmentQuantity")]
        protected ?QuantityType $consignmentQuantity = null,
        #[SerializedName("ConsolidatableIndicator")]
        protected ?Indicator $consolidatableIndicator = null,
        #[SerializedName("HaulageInstructions")]
        protected array $haulageInstructions = [],
        #[SerializedName("LoadingSequenceID")]
        protected ?IdentifierType $loadingSequenceID = null,
        #[SerializedName("ChildConsignmentQuantity")]
        protected ?QuantityType $childConsignmentQuantity = null,
        #[SerializedName("TotalPackagesQuantity")]
        protected ?QuantityType $totalPackagesQuantity = null,
        #[SerializedName("ConsolidatedShipment")]
        protected array $consolidatedShipments = [],
        #[SerializedName("CustomsDeclaration")]
        protected array $customsDeclarations = [],
        #[SerializedName("RequestedPickupTransportEvent")]
        protected ?TransportEventType $requestedPickupTransportEvent = null,
        #[SerializedName("RequestedDeliveryTransportEvent")]
        protected ?TransportEventType $requestedDeliveryTransportEvent = null,
        #[SerializedName("PlannedPickupTransportEvent")]
        protected ?TransportEventType $plannedPickupTransportEvent = null,
        #[SerializedName("PlannedDeliveryTransportEvent")]
        protected ?TransportEventType $plannedDeliveryTransportEvent = null,
        #[SerializedName("Status")]
        protected array $status = [],
        #[SerializedName("ChildConsignment")]
        protected array $childConsignments = [],
        #[SerializedName("ConsigneeParty")]
        protected ?PartyType $consigneeParty = null,
        #[SerializedName("ExporterParty")]
        protected ?PartyType $exporterParty = null,
        #[SerializedName("ConsignorParty")]
        protected ?PartyType $consignorParty = null,
        #[SerializedName("ImporterParty")]
        protected ?PartyType $importerParty = null,
        #[SerializedName("CarrierParty")]
        protected ?PartyType $carrierParty = null,
        #[SerializedName("FreightForwarderParty")]
        protected ?PartyType $freightForwarderParty = null,
        #[SerializedName("NotifyParty")]
        protected ?PartyType $notifyParty = null,
        #[SerializedName("OriginalDespatchParty")]
        protected ?PartyType $originalDespatchParty = null,
        #[SerializedName("FinalDeliveryParty")]
        protected ?PartyType $finalDeliveryParty = null,
        #[SerializedName("PerformingCarrierParty")]
        protected ?PartyType $performingCarrierParty = null,
        #[SerializedName("SubstituteCarrierParty")]
        protected ?PartyType $substituteCarrierParty = null,
        #[SerializedName("LogisticsOperatorParty")]
        protected ?PartyType $logisticsOperatorParty = null,
        #[SerializedName("TransportAdvisorParty")]
        protected ?PartyType $transportAdvisorParty = null,
        #[SerializedName("HazardousItemNotificationParty")]
        protected ?PartyType $hazardousItemNotificationParty = null,
        #[SerializedName("InsuranceParty")]
        protected ?PartyType $insuranceParty = null,
        #[SerializedName("MortgageHolderParty")]
        protected ?PartyType $mortgageHolderParty = null,
        #[SerializedName("BillOfLadingHolderParty")]
        protected ?PartyType $billOfLadingHolderParty = null,
        #[SerializedName("OriginalDepartureCountry")]
        protected ?CountryType $originalDepartureCountry = null,
        #[SerializedName("FinalDestinationCountry")]
        protected ?CountryType $finalDestinationCountry = null,
        #[SerializedName("TransitCountry")]
        protected array $transitCountries = [],
        #[SerializedName("TransportContract")]
        protected ?ContractType $transportContract = null,
        #[SerializedName("TransportEvent")]
        protected array $transportEvents = [],
        #[SerializedName("OriginalDespatchTransportationService")]
        protected ?TransportationServiceType $originalDespatchTransportationService = null,
        #[SerializedName("FinalDeliveryTransportationService")]
        protected ?TransportationServiceType $finalDeliveryTransportationService = null,
        #[SerializedName("DeliveryTerms")]
        protected ?DeliveryTermsType $deliveryTerms = null,
        #[SerializedName("PaymentTerms")]
        protected ?PaymentTermsType $paymentTerms = null,
        #[SerializedName("CollectPaymentTerms")]
        protected ?PaymentTermsType $collectPaymentTerms = null,
        #[SerializedName("DisbursementPaymentTerms")]
        protected ?PaymentTermsType $disbursementPaymentTerms = null,
        #[SerializedName("PrepaidPaymentTerms")]
        protected ?PaymentTermsType $prepaidPaymentTerms = null,
        #[SerializedName("FreightAllowanceCharge")]
        protected array $freightAllowanceCharges = [],
        #[SerializedName("ExtraAllowanceCharge")]
        protected array $extraAllowanceCharges = [],
        #[SerializedName("MainCarriageShipmentStage")]
        protected array $mainCarriageShipmentStages = [],
        #[SerializedName("PreCarriageShipmentStage")]
        protected array $preCarriageShipmentStages = [],
        #[SerializedName("OnCarriageShipmentStage")]
        protected array $onCarriageShipmentStages = [],
        #[SerializedName("TransportHandlingUnit")]
        protected array $transportHandlingUnits = [],
        #[SerializedName("FirstArrivalPortLocation")]
        protected ?LocationType $firstArrivalPortLocation = null,
        #[SerializedName("LastExitPortLocation")]
        protected ?LocationType $lastExitPortLocation = null,
    )
    {
    }
}