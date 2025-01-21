<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class ShipmentStageType
{
    /**
     * @param TextType[] $instructions
     * @param TextType[] $demurrageInstructions
     * @param PartyType[] $carrierParties
     * @param AllowanceChargeType[] $freightAllowanceCharges
     * @param TransportEventType[] $detentionTransportEvents
     * @param TransportEventType[] $requestedWaypointTransportEvents
     * @param TransportEventType[] $plannedWaypointTransportEvents
     * @param TransportEventType[] $transportEvents
     * @param PersonType[] $passengerPersons
     * @param PersonType[] $driverPersons
     * @param PersonType[] $crewMemberPersons
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('TransportModeCode')]
        protected ?CodeType $transportModeCode = null,
        #[SerializedName('TransportMeansTypeCode')]
        protected ?CodeType $transportMeansTypeCode = null,
        #[SerializedName('TransitDirectionCode')]
        protected ?CodeType $transitDirectionCode = null,
        #[SerializedName('PreCarriageIndicator')]
        protected ?Indicator $preCarriageIndicator = null,
        #[SerializedName('OnCarriageIndicator')]
        protected ?Indicator $onCarriageIndicator = null,
        #[SerializedName('EstimatedDeliveryDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $estimatedDeliveryDate = null,
        #[SerializedName('EstimatedDeliveryTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $estimatedDeliveryTime = null,
        #[SerializedName('RequiredDeliveryDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $requiredDeliveryDate = null,
        #[SerializedName('RequiredDeliveryTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $requiredDeliveryTime = null,
        #[SerializedName('LoadingSequenceID')]
        protected ?IdentifierType $loadingSequenceID = null,
        #[SerializedName('SuccessiveSequenceID')]
        protected ?IdentifierType $successiveSequenceID = null,
        #[SerializedName('Instructions')]
        protected array $instructions = [],
        #[SerializedName('DemurrageInstructions')]
        protected array $demurrageInstructions = [],
        #[SerializedName('CrewQuantity')]
        protected ?QuantityType $crewQuantity = null,
        #[SerializedName('PassengerQuantity')]
        protected ?QuantityType $passengerQuantity = null,
        #[SerializedName('TransitPeriod')]
        protected ?PeriodType $transitPeriod = null,
        #[SerializedName('CarrierParty')]
        protected array $carrierParties = [],
        #[SerializedName('TransportMeans')]
        protected ?TransportMeansType $TransportMeans = null,
        #[SerializedName('LoadingPortLocation')]
        protected ?LocationType $loadingPortLocation = null,
        #[SerializedName('UnloadingPortLocation')]
        protected ?LocationType $unloadingPortLocation = null,
        #[SerializedName('TransshipPortLocation')]
        protected ?LocationType $transshipPortLocation = null,
        #[SerializedName("LoadingTransportEvent")]
        protected ?TransportEventType $loadingTransportEvent = null,
        #[SerializedName("ExaminationTransportEvent")]
        protected ?TransportEventType $examinationTransportEvent = null,
        #[SerializedName("AvailabilityTransportEvent")]
        protected ?TransportEventType $availabilityTransportEvent = null,
        #[SerializedName("ExportationTransportEvent")]
        protected ?TransportEventType $exportationTransportEvent = null,
        #[SerializedName("DischargeTransportEvent")]
        protected ?TransportEventType $dischargeTransportEvent = null,
        #[SerializedName("WarehousingTransportEvent")]
        protected ?TransportEventType $warehousingTransportEvent = null,
        #[SerializedName("TakeoverTransportEvent")]
        protected ?TransportEventType $takeoverTransportEvent = null,
        #[SerializedName("OptionalTakeoverTransportEvent")]
        protected ?TransportEventType $optionalTakeoverTransportEvent = null,
        #[SerializedName("DropoffTransportEvent")]
        protected ?TransportEventType $dropoffTransportEvent = null,
        #[SerializedName("ActualPickupTransportEvent")]
        protected ?TransportEventType $actualPickupTransportEvent = null,
        #[SerializedName("DeliveryTransportEvent")]
        protected ?TransportEventType $deliveryTransportEvent = null,
        #[SerializedName('ReceiptTransportEvent')]
        protected ?TransportEventType $receiptTransportEvent = null,
        #[SerializedName('StorageTransportEvent')]
        protected ?TransportEventType $storageTransportEvent = null,
        #[SerializedName('AcceptanceTransportEvent')]
        protected ?TransportEventType $acceptanceTransportEvent = null,
        #[SerializedName('TerminalOperatorParty')]
        protected ?PartyType $terminalOperatorParty = null,
        #[SerializedName("CustomsAgentParty")]
        protected ?PartyType $customsAgentParty = null,
        #[SerializedName('EstimatedTransitPeriod')]
        protected ?PeriodType $estimatedTransitPeriod = null,
        #[SerializedName('FreightAllowanceCharge')]
        protected array $freightAllowanceCharges = [],
        #[SerializedName('FreightChargeLocation')]
        protected ?LocationType $freightChargeLocation = null,
        #[SerializedName('DetentionTransportEvent')]
        protected array $detentionTransportEvents = [],
        #[SerializedName("RequestedDepartureTransportEvent")]
        protected ?TransportEventType $RequestedDepartureTransportEvent = null,
        #[SerializedName("RequestedArrivalTransportEvent")]
        protected ?TransportEventType $RequestedArrivalTransportEvent = null,
        #[SerializedName("RequestedWaypointTransportEvent")]
        protected array $requestedWaypointTransportEvents = [],
        #[SerializedName("PlannedDepartureTransportEvent")]
        protected ?TransportEventType $plannedDepartureTransportEvent = null,
        #[SerializedName("PlannedArrivalTransportEvent")]
        protected ?TransportEventType $plannedArrivalTransportEvent = null,
        #[SerializedName("PlannedWaypointTransportEvent")]
        protected array $plannedWaypointTransportEvents = [],
        #[SerializedName("ActualDepartureTransportEvent")]
        protected ?TransportEventType $actualDepartureTransportEvent = null,
        #[SerializedName("ActualWaypointTransportEvent")]
        protected ?TransportEventType $actualWaypointTransportEvent = null,
        #[SerializedName("ActualArrivalTransportEvent")]
        protected ?TransportEventType $actualArrivalTransportEvent = null,
        #[SerializedName('TransportEvent')]
        protected array $transportEvents = [],
        #[SerializedName("EstimatedDepartureTransportEvent")]
        protected ?TransportEventType $estimatedDepartureTransportEvent = null,
        #[SerializedName("EstimatedArrivalTransportEvent")]
        protected ?TransportEventType $estimatedArrivalTransportEvent = null,
        #[SerializedName("PassengerPerson")]
        protected array $passengerPersons = [],
        #[SerializedName("DriverPerson")]
        protected array $driverPersons = [],
        #[SerializedName("ReportingPerson")]
        protected ?PersonType $reportingPerson = null,
        #[SerializedName("CrewMemberPerson")]
        protected array $crewMemberPersons = [],
        #[SerializedName("SecurityOfficerPerson")]
        protected ?PersonType $SecurityOfficerPerson = null,
        #[SerializedName("MasterPerson")]
        protected ?PersonType $MasterPerson = null,
        #[SerializedName("ShipsSurgeonPerson")]
        protected ?PersonType $ShipsSurgeonPerson = null,
    )
    {
    }

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getTransportModeCode(): ?CodeType
    {
        return $this->transportModeCode;
    }

    public function setTransportModeCode(?CodeType $transportModeCode): void
    {
        $this->transportModeCode = $transportModeCode;
    }

    public function getTransportMeansTypeCode(): ?CodeType
    {
        return $this->transportMeansTypeCode;
    }

    public function setTransportMeansTypeCode(?CodeType $transportMeansTypeCode): void
    {
        $this->transportMeansTypeCode = $transportMeansTypeCode;
    }

    public function getTransitDirectionCode(): ?CodeType
    {
        return $this->transitDirectionCode;
    }

    public function setTransitDirectionCode(?CodeType $transitDirectionCode): void
    {
        $this->transitDirectionCode = $transitDirectionCode;
    }

    public function getPreCarriageIndicator(): ?Indicator
    {
        return $this->preCarriageIndicator;
    }

    public function setPreCarriageIndicator(?Indicator $preCarriageIndicator): void
    {
        $this->preCarriageIndicator = $preCarriageIndicator;
    }

    public function getOnCarriageIndicator(): ?Indicator
    {
        return $this->onCarriageIndicator;
    }

    public function setOnCarriageIndicator(?Indicator $onCarriageIndicator): void
    {
        $this->onCarriageIndicator = $onCarriageIndicator;
    }

    public function getEstimatedDeliveryDate(): ?DateTimeInterface
    {
        return $this->estimatedDeliveryDate;
    }

    public function setEstimatedDeliveryDate(?DateTimeInterface $estimatedDeliveryDate): void
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
    }

    public function getEstimatedDeliveryTime(): ?DateTimeInterface
    {
        return $this->estimatedDeliveryTime;
    }

    public function setEstimatedDeliveryTime(?DateTimeInterface $estimatedDeliveryTime): void
    {
        $this->estimatedDeliveryTime = $estimatedDeliveryTime;
    }

    public function getRequiredDeliveryDate(): ?DateTimeInterface
    {
        return $this->requiredDeliveryDate;
    }

    public function setRequiredDeliveryDate(?DateTimeInterface $requiredDeliveryDate): void
    {
        $this->requiredDeliveryDate = $requiredDeliveryDate;
    }

    public function getRequiredDeliveryTime(): ?DateTimeInterface
    {
        return $this->requiredDeliveryTime;
    }

    public function setRequiredDeliveryTime(?DateTimeInterface $requiredDeliveryTime): void
    {
        $this->requiredDeliveryTime = $requiredDeliveryTime;
    }

    public function getLoadingSequenceID(): ?IdentifierType
    {
        return $this->loadingSequenceID;
    }

    public function setLoadingSequenceID(?IdentifierType $loadingSequenceID): void
    {
        $this->loadingSequenceID = $loadingSequenceID;
    }

    public function getSuccessiveSequenceID(): ?IdentifierType
    {
        return $this->successiveSequenceID;
    }

    public function setSuccessiveSequenceID(?IdentifierType $successiveSequenceID): void
    {
        $this->successiveSequenceID = $successiveSequenceID;
    }

    public function getInstructions(): array
    {
        return $this->instructions;
    }

    public function setInstructions(array $instructions): void
    {
        $this->instructions = $instructions;
    }

    public function getDemurrageInstructions(): array
    {
        return $this->demurrageInstructions;
    }

    public function setDemurrageInstructions(array $demurrageInstructions): void
    {
        $this->demurrageInstructions = $demurrageInstructions;
    }

    public function getCrewQuantity(): ?QuantityType
    {
        return $this->crewQuantity;
    }

    public function setCrewQuantity(?QuantityType $crewQuantity): void
    {
        $this->crewQuantity = $crewQuantity;
    }

    public function getPassengerQuantity(): ?QuantityType
    {
        return $this->passengerQuantity;
    }

    public function setPassengerQuantity(?QuantityType $passengerQuantity): void
    {
        $this->passengerQuantity = $passengerQuantity;
    }

    public function getTransitPeriod(): ?PeriodType
    {
        return $this->transitPeriod;
    }

    public function setTransitPeriod(?PeriodType $transitPeriod): void
    {
        $this->transitPeriod = $transitPeriod;
    }

    public function getCarrierParties(): array
    {
        return $this->carrierParties;
    }

    public function setCarrierParties(array $carrierParties): void
    {
        $this->carrierParties = $carrierParties;
    }

    public function getTransportMeans(): ?TransportMeansType
    {
        return $this->TransportMeans;
    }

    public function setTransportMeans(?TransportMeansType $TransportMeans): void
    {
        $this->TransportMeans = $TransportMeans;
    }

    public function getLoadingPortLocation(): ?LocationType
    {
        return $this->loadingPortLocation;
    }

    public function setLoadingPortLocation(?LocationType $loadingPortLocation): void
    {
        $this->loadingPortLocation = $loadingPortLocation;
    }

    public function getUnloadingPortLocation(): ?LocationType
    {
        return $this->unloadingPortLocation;
    }

    public function setUnloadingPortLocation(?LocationType $unloadingPortLocation): void
    {
        $this->unloadingPortLocation = $unloadingPortLocation;
    }

    public function getTransshipPortLocation(): ?LocationType
    {
        return $this->transshipPortLocation;
    }

    public function setTransshipPortLocation(?LocationType $transshipPortLocation): void
    {
        $this->transshipPortLocation = $transshipPortLocation;
    }

    public function getLoadingTransportEvent(): ?TransportEventType
    {
        return $this->loadingTransportEvent;
    }

    public function setLoadingTransportEvent(?TransportEventType $loadingTransportEvent): void
    {
        $this->loadingTransportEvent = $loadingTransportEvent;
    }

    public function getExaminationTransportEvent(): ?TransportEventType
    {
        return $this->examinationTransportEvent;
    }

    public function setExaminationTransportEvent(?TransportEventType $examinationTransportEvent): void
    {
        $this->examinationTransportEvent = $examinationTransportEvent;
    }

    public function getAvailabilityTransportEvent(): ?TransportEventType
    {
        return $this->availabilityTransportEvent;
    }

    public function setAvailabilityTransportEvent(?TransportEventType $availabilityTransportEvent): void
    {
        $this->availabilityTransportEvent = $availabilityTransportEvent;
    }

    public function getExportationTransportEvent(): ?TransportEventType
    {
        return $this->exportationTransportEvent;
    }

    public function setExportationTransportEvent(?TransportEventType $exportationTransportEvent): void
    {
        $this->exportationTransportEvent = $exportationTransportEvent;
    }

    public function getDischargeTransportEvent(): ?TransportEventType
    {
        return $this->dischargeTransportEvent;
    }

    public function setDischargeTransportEvent(?TransportEventType $dischargeTransportEvent): void
    {
        $this->dischargeTransportEvent = $dischargeTransportEvent;
    }

    public function getWarehousingTransportEvent(): ?TransportEventType
    {
        return $this->warehousingTransportEvent;
    }

    public function setWarehousingTransportEvent(?TransportEventType $warehousingTransportEvent): void
    {
        $this->warehousingTransportEvent = $warehousingTransportEvent;
    }

    public function getTakeoverTransportEvent(): ?TransportEventType
    {
        return $this->takeoverTransportEvent;
    }

    public function setTakeoverTransportEvent(?TransportEventType $takeoverTransportEvent): void
    {
        $this->takeoverTransportEvent = $takeoverTransportEvent;
    }

    public function getOptionalTakeoverTransportEvent(): ?TransportEventType
    {
        return $this->optionalTakeoverTransportEvent;
    }

    public function setOptionalTakeoverTransportEvent(?TransportEventType $optionalTakeoverTransportEvent): void
    {
        $this->optionalTakeoverTransportEvent = $optionalTakeoverTransportEvent;
    }

    public function getDropoffTransportEvent(): ?TransportEventType
    {
        return $this->dropoffTransportEvent;
    }

    public function setDropoffTransportEvent(?TransportEventType $dropoffTransportEvent): void
    {
        $this->dropoffTransportEvent = $dropoffTransportEvent;
    }

    public function getActualPickupTransportEvent(): ?TransportEventType
    {
        return $this->actualPickupTransportEvent;
    }

    public function setActualPickupTransportEvent(?TransportEventType $actualPickupTransportEvent): void
    {
        $this->actualPickupTransportEvent = $actualPickupTransportEvent;
    }

    public function getDeliveryTransportEvent(): ?TransportEventType
    {
        return $this->deliveryTransportEvent;
    }

    public function setDeliveryTransportEvent(?TransportEventType $deliveryTransportEvent): void
    {
        $this->deliveryTransportEvent = $deliveryTransportEvent;
    }

    public function getReceiptTransportEvent(): ?TransportEventType
    {
        return $this->receiptTransportEvent;
    }

    public function setReceiptTransportEvent(?TransportEventType $receiptTransportEvent): void
    {
        $this->receiptTransportEvent = $receiptTransportEvent;
    }

    public function getStorageTransportEvent(): ?TransportEventType
    {
        return $this->storageTransportEvent;
    }

    public function setStorageTransportEvent(?TransportEventType $storageTransportEvent): void
    {
        $this->storageTransportEvent = $storageTransportEvent;
    }

    public function getAcceptanceTransportEvent(): ?TransportEventType
    {
        return $this->acceptanceTransportEvent;
    }

    public function setAcceptanceTransportEvent(?TransportEventType $acceptanceTransportEvent): void
    {
        $this->acceptanceTransportEvent = $acceptanceTransportEvent;
    }

    public function getTerminalOperatorParty(): ?PartyType
    {
        return $this->terminalOperatorParty;
    }

    public function setTerminalOperatorParty(?PartyType $terminalOperatorParty): void
    {
        $this->terminalOperatorParty = $terminalOperatorParty;
    }

    public function getCustomsAgentParty(): ?PartyType
    {
        return $this->customsAgentParty;
    }

    public function setCustomsAgentParty(?PartyType $customsAgentParty): void
    {
        $this->customsAgentParty = $customsAgentParty;
    }

    public function getEstimatedTransitPeriod(): ?PeriodType
    {
        return $this->estimatedTransitPeriod;
    }

    public function setEstimatedTransitPeriod(?PeriodType $estimatedTransitPeriod): void
    {
        $this->estimatedTransitPeriod = $estimatedTransitPeriod;
    }

    public function getFreightAllowanceCharges(): array
    {
        return $this->freightAllowanceCharges;
    }

    public function setFreightAllowanceCharges(array $freightAllowanceCharges): void
    {
        $this->freightAllowanceCharges = $freightAllowanceCharges;
    }

    public function getFreightChargeLocation(): ?LocationType
    {
        return $this->freightChargeLocation;
    }

    public function setFreightChargeLocation(?LocationType $freightChargeLocation): void
    {
        $this->freightChargeLocation = $freightChargeLocation;
    }

    public function getDetentionTransportEvents(): array
    {
        return $this->detentionTransportEvents;
    }

    public function setDetentionTransportEvents(array $detentionTransportEvents): void
    {
        $this->detentionTransportEvents = $detentionTransportEvents;
    }

    public function getRequestedDepartureTransportEvent(): ?TransportEventType
    {
        return $this->RequestedDepartureTransportEvent;
    }

    public function setRequestedDepartureTransportEvent(?TransportEventType $RequestedDepartureTransportEvent): void
    {
        $this->RequestedDepartureTransportEvent = $RequestedDepartureTransportEvent;
    }

    public function getRequestedArrivalTransportEvent(): ?TransportEventType
    {
        return $this->RequestedArrivalTransportEvent;
    }

    public function setRequestedArrivalTransportEvent(?TransportEventType $RequestedArrivalTransportEvent): void
    {
        $this->RequestedArrivalTransportEvent = $RequestedArrivalTransportEvent;
    }

    public function getRequestedWaypointTransportEvents(): array
    {
        return $this->requestedWaypointTransportEvents;
    }

    public function setRequestedWaypointTransportEvents(array $requestedWaypointTransportEvents): void
    {
        $this->requestedWaypointTransportEvents = $requestedWaypointTransportEvents;
    }

    public function getPlannedDepartureTransportEvent(): ?TransportEventType
    {
        return $this->plannedDepartureTransportEvent;
    }

    public function setPlannedDepartureTransportEvent(?TransportEventType $plannedDepartureTransportEvent): void
    {
        $this->plannedDepartureTransportEvent = $plannedDepartureTransportEvent;
    }

    public function getPlannedArrivalTransportEvent(): ?TransportEventType
    {
        return $this->plannedArrivalTransportEvent;
    }

    public function setPlannedArrivalTransportEvent(?TransportEventType $plannedArrivalTransportEvent): void
    {
        $this->plannedArrivalTransportEvent = $plannedArrivalTransportEvent;
    }

    public function getPlannedWaypointTransportEvents(): array
    {
        return $this->plannedWaypointTransportEvents;
    }

    public function setPlannedWaypointTransportEvents(array $plannedWaypointTransportEvents): void
    {
        $this->plannedWaypointTransportEvents = $plannedWaypointTransportEvents;
    }

    public function getActualDepartureTransportEvent(): ?TransportEventType
    {
        return $this->actualDepartureTransportEvent;
    }

    public function setActualDepartureTransportEvent(?TransportEventType $actualDepartureTransportEvent): void
    {
        $this->actualDepartureTransportEvent = $actualDepartureTransportEvent;
    }

    public function getActualWaypointTransportEvent(): ?TransportEventType
    {
        return $this->actualWaypointTransportEvent;
    }

    public function setActualWaypointTransportEvent(?TransportEventType $actualWaypointTransportEvent): void
    {
        $this->actualWaypointTransportEvent = $actualWaypointTransportEvent;
    }

    public function getActualArrivalTransportEvent(): ?TransportEventType
    {
        return $this->actualArrivalTransportEvent;
    }

    public function setActualArrivalTransportEvent(?TransportEventType $actualArrivalTransportEvent): void
    {
        $this->actualArrivalTransportEvent = $actualArrivalTransportEvent;
    }

    public function getTransportEvents(): array
    {
        return $this->transportEvents;
    }

    public function setTransportEvents(array $transportEvents): void
    {
        $this->transportEvents = $transportEvents;
    }

    public function getEstimatedDepartureTransportEvent(): ?TransportEventType
    {
        return $this->estimatedDepartureTransportEvent;
    }

    public function setEstimatedDepartureTransportEvent(?TransportEventType $estimatedDepartureTransportEvent): void
    {
        $this->estimatedDepartureTransportEvent = $estimatedDepartureTransportEvent;
    }

    public function getEstimatedArrivalTransportEvent(): ?TransportEventType
    {
        return $this->estimatedArrivalTransportEvent;
    }

    public function setEstimatedArrivalTransportEvent(?TransportEventType $estimatedArrivalTransportEvent): void
    {
        $this->estimatedArrivalTransportEvent = $estimatedArrivalTransportEvent;
    }

    public function getPassengerPersons(): array
    {
        return $this->passengerPersons;
    }

    public function setPassengerPersons(array $passengerPersons): void
    {
        $this->passengerPersons = $passengerPersons;
    }

    public function getDriverPersons(): array
    {
        return $this->driverPersons;
    }

    public function setDriverPersons(array $driverPersons): void
    {
        $this->driverPersons = $driverPersons;
    }

    public function getReportingPerson(): ?PersonType
    {
        return $this->reportingPerson;
    }

    public function setReportingPerson(?PersonType $reportingPerson): void
    {
        $this->reportingPerson = $reportingPerson;
    }

    public function getCrewMemberPersons(): array
    {
        return $this->crewMemberPersons;
    }

    public function setCrewMemberPersons(array $crewMemberPersons): void
    {
        $this->crewMemberPersons = $crewMemberPersons;
    }

    public function getSecurityOfficerPerson(): ?PersonType
    {
        return $this->SecurityOfficerPerson;
    }

    public function setSecurityOfficerPerson(?PersonType $SecurityOfficerPerson): void
    {
        $this->SecurityOfficerPerson = $SecurityOfficerPerson;
    }

    public function getMasterPerson(): ?PersonType
    {
        return $this->MasterPerson;
    }

    public function setMasterPerson(?PersonType $MasterPerson): void
    {
        $this->MasterPerson = $MasterPerson;
    }

    public function getShipsSurgeonPerson(): ?PersonType
    {
        return $this->ShipsSurgeonPerson;
    }

    public function setShipsSurgeonPerson(?PersonType $ShipsSurgeonPerson): void
    {
        $this->ShipsSurgeonPerson = $ShipsSurgeonPerson;
    }
}