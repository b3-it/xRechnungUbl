<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\PercentType;
use UBL\UnqualifiedDataTypes\TextType;

class TransportEquipmentType
{
    /**
     * @param IdentifierType[] $referencedConsignmentIDs
     * @param TextType[] $information
     * @param TextType[] $damageRemarks
     * @param TextType[] $descriptions
     * @param TextType[] $specialTransportRequirements
     * @param DimensionType[] $measurementDimensions
     * @param TransportEquipmentSealType[] $transportEquipmentSeals
     * @param TransportEventType[] $positioningTransportEvents
     * @param TransportEventType[] $quarantineTransportEvents
     * @param TransportEventType[] $deliveryTransportEvents
     * @param TransportEventType[] $pickupTransportEvents
     * @param TransportEventType[] $handlingTransportEvents
     * @param TransportEventType[] $loadingTransportEvents
     * @param TransportEventType[] $transportEvents
     * @param TradingTermsType[] $haulageTradingTerms
     * @param HazardousGoodsTransitType[] $hazardousGoodsTransits
     * @param TransportHandlingUnitType[] $packagedTransportHandlingUnits
     * @param AllowanceChargeType[] $serviceAllowanceCharges
     * @param AllowanceChargeType[] $freightAllowanceCharges
     * @param TransportEquipmentType[] $attachedTransportEquipments
     * @param DocumentReferenceType[] $shipmentDocumentReferences
     * @param TransportEquipmentType[] $containedInTransportEquipments
     * @param PackageType[] $packages
     * @param GoodsItemType[] $goodsItems
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('ReferencedConsignmentID')]
        protected array $referencedConsignmentIDs = [],
        #[SerializedName('TransportEquipmentTypeCode')]
        protected ?CodeType $transportEquipmentTypeCode = null,
        #[SerializedName('ProviderTypeCode')]
        protected ?CodeType $providerTypeCode = null,
        #[SerializedName('OwnerTypeCode')]
        protected ?CodeType $ownerTypeCode = null,
        #[SerializedName('SizeTypeCode')]
        protected ?CodeType $sizeTypeCode = null,
        #[SerializedName('DispositionCode')]
        protected ?CodeType $dispositionCode = null,
        #[SerializedName('FullnessIndicationCode')]
        protected ?CodeType $fullnessIndicationCode = null,
        #[SerializedName('RefrigerationOnIndicator')]
        protected ?Indicator $refrigerationOnIndicator = null,
        #[SerializedName('Information')]
        protected array $information = [],
        #[SerializedName('ReturnabilityIndicator')]
        protected ?Indicator $returnabilityIndicator = null,
        #[SerializedName('LegalStatusIndicator')]
        protected ?Indicator $legalStatusIndicator = null,
        #[SerializedName('AirFlowPercent')]
        protected ?PercentType $airFlowPercent = null,
        #[SerializedName('HumidityPercent')]
        protected ?PercentType $humidityPercent = null,
        #[SerializedName('AnimalFoodApprovedIndicator')]
        protected ?Indicator $animalFoodApprovedIndicator = null,
        #[SerializedName('HumanFoodApprovedIndicator')]
        protected ?Indicator $humanFoodApprovedIndicator = null,
        #[SerializedName('DangerousGoodsApprovedIndicator')]
        protected ?Indicator $dangerousGoodsApprovedIndicator = null,
        #[SerializedName('RefrigeratedIndicator')]
        protected ?Indicator $refrigeratedIndicator = null,
        #[SerializedName('Characteristics')]
        protected ?TextType $characteristics = null,
        #[SerializedName('DamageRemarks')]
        protected array $damageRemarks = [],
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('SpecialTransportRequirements')]
        protected array $specialTransportRequirements = [],
        #[SerializedName('GrossWeightMeasure')]
        protected ?MeasureType $grossWeightMeasure = null,
        #[SerializedName('GrossVolumeMeasure')]
        protected ?MeasureType $grossVolumeMeasure = null,
        #[SerializedName('TareWeightMeasure')]
        protected ?MeasureType $tareWeightMeasure = null,
        #[SerializedName('TrackingDeviceCode')]
        protected ?CodeType $trackingDeviceCode = null,
        #[SerializedName('PowerIndicator')]
        protected ?Indicator $powerIndicator = null,
        #[SerializedName('TraceID')]
        protected ?IdentifierType $traceID = null,
        #[SerializedName('MeasurementDimension')]
        protected array $measurementDimensions = [],
        #[SerializedName('TransportEquipmentSeal')]
        protected array $transportEquipmentSeals = [],
        #[SerializedName('MinimumTemperature')]
        protected ?TemperatureType $minimumTemperature = null,
        #[SerializedName('MaximumTemperature')]
        protected ?TemperatureType $maximumTemperature = null,
        #[SerializedName('ProviderParty')]
        protected ?PartyType $providerParty = null,
        #[SerializedName('LoadingProofParty')]
        protected ?PartyType $loadingProofParty = null,
        #[SerializedName('SupplierParty')]
        protected ?SupplierPartyType $supplierParty = null,
        #[SerializedName('OwnerParty')]
        protected ?PartyType $ownerParty = null,
        #[SerializedName('OperatingParty')]
        protected ?PartyType $operatingParty = null,
        #[SerializedName('LoadingLocation')]
        protected ?LocationType $loadingLocation = null,
        #[SerializedName('UnloadingLocation')]
        protected ?LocationType $unloadingLocation = null,
        #[SerializedName('StorageLocation')]
        protected ?LocationType $storageLocation = null,
        #[SerializedName('PositioningTransportEvent')]
        protected array $positioningTransportEvents = [],
        #[SerializedName('QuarantineTransportEvent')]
        protected array $quarantineTransportEvents = [],
        #[SerializedName('DeliveryTransportEvent')]
        protected array $deliveryTransportEvents = [],
        #[SerializedName('PickupTransportEvent')]
        protected array $pickupTransportEvents = [],
        #[SerializedName('HandlingTransportEvent')]
        protected array $handlingTransportEvents = [],
        #[SerializedName('LoadingTransportEvent')]
        protected array $loadingTransportEvents = [],
        #[SerializedName('TransportEvent')]
        protected array $transportEvents = [],
        #[SerializedName('ApplicableTransportMeans')]
        protected ?TransportMeansType $applicableTransportMeans = null,
        #[SerializedName('HaulageTradingTerms')]
        protected array $haulageTradingTerms = [],
        #[SerializedName('HazardousGoodsTransit')]
        protected array $hazardousGoodsTransits = [],
        #[SerializedName('PackagedTransportHandlingUnit')]
        protected array $packagedTransportHandlingUnits = [],
        #[SerializedName('ServiceAllowanceCharge')]
        protected array $serviceAllowanceCharges = [],
        #[SerializedName('FreightAllowanceCharge')]
        protected array $freightAllowanceCharges = [],
        #[SerializedName('AttachedTransportEquipment')]
        protected array $attachedTransportEquipments = [],
        #[SerializedName('Delivery')]
        protected ?DeliveryType $delivery = null,
        #[SerializedName('Pickup')]
        protected ?PickupType $pickup = null,
        #[SerializedName('Despatch')]
        protected ?DespatchType $despatch = null,
        #[SerializedName('ShipmentDocumentReference')]
        protected array $shipmentDocumentReferences = [],
        #[SerializedName('ContainedInTransportEquipment')]
        protected array $containedInTransportEquipments = [],
        #[SerializedName('Package')]
        protected array $packages = [],
        #[SerializedName('GoodsItem')]
        protected array $goodsItems = []
    )
    {
    }

    /**
     * @return IdentifierType[]
     */
    public function getReferencedConsignmentIDs(): array
    {
        return $this->referencedConsignmentIDs;
    }

    /**
     * @param IdentifierType[] $referencedConsignmentIDs
     * @return void
     */
    public function setReferencedConsignmentIDs(array $referencedConsignmentIDs): void
    {
        $this->referencedConsignmentIDs = $referencedConsignmentIDs;
    }

    public function getTransportEquipmentTypeCode(): ?CodeType
    {
        return $this->transportEquipmentTypeCode;
    }

    public function setTransportEquipmentTypeCode(?CodeType $transportEquipmentTypeCode): void
    {
        $this->transportEquipmentTypeCode = $transportEquipmentTypeCode;
    }

    public function getProviderTypeCode(): ?CodeType
    {
        return $this->providerTypeCode;
    }

    public function setProviderTypeCode(?CodeType $providerTypeCode): void
    {
        $this->providerTypeCode = $providerTypeCode;
    }

    public function getOwnerTypeCode(): ?CodeType
    {
        return $this->ownerTypeCode;
    }

    public function setOwnerTypeCode(?CodeType $ownerTypeCode): void
    {
        $this->ownerTypeCode = $ownerTypeCode;
    }

    public function getSizeTypeCode(): ?CodeType
    {
        return $this->sizeTypeCode;
    }

    public function setSizeTypeCode(?CodeType $sizeTypeCode): void
    {
        $this->sizeTypeCode = $sizeTypeCode;
    }

    public function getDispositionCode(): ?CodeType
    {
        return $this->dispositionCode;
    }

    public function setDispositionCode(?CodeType $dispositionCode): void
    {
        $this->dispositionCode = $dispositionCode;
    }

    public function getFullnessIndicationCode(): ?CodeType
    {
        return $this->fullnessIndicationCode;
    }

    public function setFullnessIndicationCode(?CodeType $fullnessIndicationCode): void
    {
        $this->fullnessIndicationCode = $fullnessIndicationCode;
    }

    public function getRefrigerationOnIndicator(): ?Indicator
    {
        return $this->refrigerationOnIndicator;
    }

    public function setRefrigerationOnIndicator(?Indicator $refrigerationOnIndicator): void
    {
        $this->refrigerationOnIndicator = $refrigerationOnIndicator;
    }

    /**
     * @return TextType[]
     */
    public function getInformation(): array
    {
        return $this->information;
    }

    /**
     * @param TextType[] $information
     * @return void
     */
    public function setInformation(array $information): void
    {
        $this->information = $information;
    }

    public function getReturnabilityIndicator(): ?Indicator
    {
        return $this->returnabilityIndicator;
    }

    public function setReturnabilityIndicator(?Indicator $returnabilityIndicator): void
    {
        $this->returnabilityIndicator = $returnabilityIndicator;
    }

    public function getLegalStatusIndicator(): ?Indicator
    {
        return $this->legalStatusIndicator;
    }

    public function setLegalStatusIndicator(?Indicator $legalStatusIndicator): void
    {
        $this->legalStatusIndicator = $legalStatusIndicator;
    }

    public function getAirFlowPercent(): ?PercentType
    {
        return $this->airFlowPercent;
    }

    public function setAirFlowPercent(?PercentType $airFlowPercent): void
    {
        $this->airFlowPercent = $airFlowPercent;
    }

    public function getHumidityPercent(): ?PercentType
    {
        return $this->humidityPercent;
    }

    public function setHumidityPercent(?PercentType $humidityPercent): void
    {
        $this->humidityPercent = $humidityPercent;
    }

    public function getAnimalFoodApprovedIndicator(): ?Indicator
    {
        return $this->animalFoodApprovedIndicator;
    }

    public function setAnimalFoodApprovedIndicator(?Indicator $animalFoodApprovedIndicator): void
    {
        $this->animalFoodApprovedIndicator = $animalFoodApprovedIndicator;
    }

    public function getHumanFoodApprovedIndicator(): ?Indicator
    {
        return $this->humanFoodApprovedIndicator;
    }

    public function setHumanFoodApprovedIndicator(?Indicator $humanFoodApprovedIndicator): void
    {
        $this->humanFoodApprovedIndicator = $humanFoodApprovedIndicator;
    }

    public function getDangerousGoodsApprovedIndicator(): ?Indicator
    {
        return $this->dangerousGoodsApprovedIndicator;
    }

    public function setDangerousGoodsApprovedIndicator(?Indicator $dangerousGoodsApprovedIndicator): void
    {
        $this->dangerousGoodsApprovedIndicator = $dangerousGoodsApprovedIndicator;
    }

    public function getRefrigeratedIndicator(): ?Indicator
    {
        return $this->refrigeratedIndicator;
    }

    public function setRefrigeratedIndicator(?Indicator $refrigeratedIndicator): void
    {
        $this->refrigeratedIndicator = $refrigeratedIndicator;
    }

    public function getCharacteristics(): ?TextType
    {
        return $this->characteristics;
    }

    public function setCharacteristics(?TextType $characteristics): void
    {
        $this->characteristics = $characteristics;
    }

    /**
     * @return TextType[]
     */
    public function getDamageRemarks(): array
    {
        return $this->damageRemarks;
    }

    /**
     * @param TextType[] $damageRemarks
     * @return void
     */
    public function setDamageRemarks(array $damageRemarks): void
    {
        $this->damageRemarks = $damageRemarks;
    }

    /**
     * @return TextType[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param TextType[] $descriptions
     * @return void
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = $descriptions;
    }

    /**
     * @return TextType[]
     */
    public function getSpecialTransportRequirements(): array
    {
        return $this->specialTransportRequirements;
    }

    /**
     * @param TextType[] $specialTransportRequirements
     * @return void
     */
    public function setSpecialTransportRequirements(array $specialTransportRequirements): void
    {
        $this->specialTransportRequirements = $specialTransportRequirements;
    }

    public function getGrossWeightMeasure(): ?MeasureType
    {
        return $this->grossWeightMeasure;
    }

    public function setGrossWeightMeasure(?MeasureType $grossWeightMeasure): void
    {
        $this->grossWeightMeasure = $grossWeightMeasure;
    }

    public function getGrossVolumeMeasure(): ?MeasureType
    {
        return $this->grossVolumeMeasure;
    }

    public function setGrossVolumeMeasure(?MeasureType $grossVolumeMeasure): void
    {
        $this->grossVolumeMeasure = $grossVolumeMeasure;
    }

    public function getTareWeightMeasure(): ?MeasureType
    {
        return $this->tareWeightMeasure;
    }

    public function setTareWeightMeasure(?MeasureType $tareWeightMeasure): void
    {
        $this->tareWeightMeasure = $tareWeightMeasure;
    }

    public function getTrackingDeviceCode(): ?CodeType
    {
        return $this->trackingDeviceCode;
    }

    public function setTrackingDeviceCode(?CodeType $trackingDeviceCode): void
    {
        $this->trackingDeviceCode = $trackingDeviceCode;
    }

    public function getPowerIndicator(): ?Indicator
    {
        return $this->powerIndicator;
    }

    public function setPowerIndicator(?Indicator $powerIndicator): void
    {
        $this->powerIndicator = $powerIndicator;
    }

    public function getTraceID(): ?IdentifierType
    {
        return $this->traceID;
    }

    public function setTraceID(?IdentifierType $traceID): void
    {
        $this->traceID = $traceID;
    }

    /**
     * @return DimensionType[]
     */
    public function getMeasurementDimensions(): array
    {
        return $this->measurementDimensions;
    }

    /**
     * @param DimensionType[] $measurementDimensions
     * @return void
     */
    public function setMeasurementDimensions(array $measurementDimensions): void
    {
        $this->measurementDimensions = $measurementDimensions;
    }

    /**
     * @return TransportEquipmentSealType[]
     */
    public function getTransportEquipmentSeals(): array
    {
        return $this->transportEquipmentSeals;
    }

    /**
     * @param TransportEquipmentSealType[] $transportEquipmentSeals
     * @return void
     */
    public function setTransportEquipmentSeals(array $transportEquipmentSeals): void
    {
        $this->transportEquipmentSeals = $transportEquipmentSeals;
    }

    public function getMinimumTemperature(): ?TemperatureType
    {
        return $this->minimumTemperature;
    }

    public function setMinimumTemperature(?TemperatureType $minimumTemperature): void
    {
        $this->minimumTemperature = $minimumTemperature;
    }

    public function getMaximumTemperature(): ?TemperatureType
    {
        return $this->maximumTemperature;
    }

    public function setMaximumTemperature(?TemperatureType $maximumTemperature): void
    {
        $this->maximumTemperature = $maximumTemperature;
    }

    public function getProviderParty(): ?PartyType
    {
        return $this->providerParty;
    }

    public function setProviderParty(?PartyType $providerParty): void
    {
        $this->providerParty = $providerParty;
    }

    public function getLoadingProofParty(): ?PartyType
    {
        return $this->loadingProofParty;
    }

    public function setLoadingProofParty(?PartyType $loadingProofParty): void
    {
        $this->loadingProofParty = $loadingProofParty;
    }

    public function getSupplierParty(): ?SupplierPartyType
    {
        return $this->supplierParty;
    }

    public function setSupplierParty(?SupplierPartyType $supplierParty): void
    {
        $this->supplierParty = $supplierParty;
    }

    public function getOwnerParty(): ?PartyType
    {
        return $this->ownerParty;
    }

    public function setOwnerParty(?PartyType $ownerParty): void
    {
        $this->ownerParty = $ownerParty;
    }

    public function getOperatingParty(): ?PartyType
    {
        return $this->operatingParty;
    }

    public function setOperatingParty(?PartyType $operatingParty): void
    {
        $this->operatingParty = $operatingParty;
    }

    public function getLoadingLocation(): ?LocationType
    {
        return $this->loadingLocation;
    }

    public function setLoadingLocation(?LocationType $loadingLocation): void
    {
        $this->loadingLocation = $loadingLocation;
    }

    public function getUnloadingLocation(): ?LocationType
    {
        return $this->unloadingLocation;
    }

    public function setUnloadingLocation(?LocationType $unloadingLocation): void
    {
        $this->unloadingLocation = $unloadingLocation;
    }

    public function getStorageLocation(): ?LocationType
    {
        return $this->storageLocation;
    }

    public function setStorageLocation(?LocationType $storageLocation): void
    {
        $this->storageLocation = $storageLocation;
    }

    /**
     * @return TransportEventType[]
     */
    public function getPositioningTransportEvents(): array
    {
        return $this->positioningTransportEvents;
    }

    /**
     * @param TransportEventType[] $positioningTransportEvents
     * @return void
     */
    public function setPositioningTransportEvents(array $positioningTransportEvents): void
    {
        $this->positioningTransportEvents = $positioningTransportEvents;
    }

    /**
     * @return TransportEventType[]
     */
    public function getQuarantineTransportEvents(): array
    {
        return $this->quarantineTransportEvents;
    }

    /**
     * @param TransportEventType[] $quarantineTransportEvents
     * @return void
     */
    public function setQuarantineTransportEvents(array $quarantineTransportEvents): void
    {
        $this->quarantineTransportEvents = $quarantineTransportEvents;
    }

    /**
     * @return TransportEventType[]
     */
    public function getDeliveryTransportEvents(): array
    {
        return $this->deliveryTransportEvents;
    }

    /**
     * @param TransportEventType[] $deliveryTransportEvents
     * @return void
     */
    public function setDeliveryTransportEvents(array $deliveryTransportEvents): void
    {
        $this->deliveryTransportEvents = $deliveryTransportEvents;
    }

    /**
     * @return TransportEventType[]
     */
    public function getPickupTransportEvents(): array
    {
        return $this->pickupTransportEvents;
    }

    /**
     * @param TransportEventType[] $pickupTransportEvents
     * @return void
     */
    public function setPickupTransportEvents(array $pickupTransportEvents): void
    {
        $this->pickupTransportEvents = $pickupTransportEvents;
    }

    /**
     * @return TransportEventType[]
     */
    public function getHandlingTransportEvents(): array
    {
        return $this->handlingTransportEvents;
    }

    /**
     * @param TransportEventType[] $handlingTransportEvents
     * @return void
     */
    public function setHandlingTransportEvents(array $handlingTransportEvents): void
    {
        $this->handlingTransportEvents = $handlingTransportEvents;
    }

    /**
     * @return TransportEventType[]
     */
    public function getLoadingTransportEvents(): array
    {
        return $this->loadingTransportEvents;
    }

    /**
     * @param TransportEventType[] $loadingTransportEvents
     * @return void
     */
    public function setLoadingTransportEvents(array $loadingTransportEvents): void
    {
        $this->loadingTransportEvents = $loadingTransportEvents;
    }

    /**
     * @return TransportEventType[]
     */
    public function getTransportEvents(): array
    {
        return $this->transportEvents;
    }

    /**
     * @param TransportEventType[] $transportEvents
     * @return void
     */
    public function setTransportEvents(array $transportEvents): void
    {
        $this->transportEvents = $transportEvents;
    }

    public function getApplicableTransportMeans(): ?TransportMeansType
    {
        return $this->applicableTransportMeans;
    }

    public function setApplicableTransportMeans(?TransportMeansType $applicableTransportMeans): void
    {
        $this->applicableTransportMeans = $applicableTransportMeans;
    }

    /**
     * @return TradingTermsType[]
     */
    public function getHaulageTradingTerms(): array
    {
        return $this->haulageTradingTerms;
    }

    /**
     * @param TradingTermsType[] $haulageTradingTerms
     * @return void
     */
    public function setHaulageTradingTerms(array $haulageTradingTerms): void
    {
        $this->haulageTradingTerms = $haulageTradingTerms;
    }

    /**
     * @return HazardousGoodsTransitType[]
     */
    public function getHazardousGoodsTransits(): array
    {
        return $this->hazardousGoodsTransits;
    }

    /**
     * @param HazardousGoodsTransitType[] $hazardousGoodsTransits
     * @return void
     */
    public function setHazardousGoodsTransits(array $hazardousGoodsTransits): void
    {
        $this->hazardousGoodsTransits = $hazardousGoodsTransits;
    }

    /**
     * @return TransportHandlingUnitType[]
     */
    public function getPackagedTransportHandlingUnits(): array
    {
        return $this->packagedTransportHandlingUnits;
    }

    /**
     * @param TransportHandlingUnitType[] $packagedTransportHandlingUnits
     * @return void
     */
    public function setPackagedTransportHandlingUnits(array $packagedTransportHandlingUnits): void
    {
        $this->packagedTransportHandlingUnits = $packagedTransportHandlingUnits;
    }

    /**
     * @return AllowanceChargeType[]
     */
    public function getServiceAllowanceCharges(): array
    {
        return $this->serviceAllowanceCharges;
    }

    /**
     * @param AllowanceChargeType[] $serviceAllowanceCharges
     * @return void
     */
    public function setServiceAllowanceCharges(array $serviceAllowanceCharges): void
    {
        $this->serviceAllowanceCharges = $serviceAllowanceCharges;
    }

    /**
     * @return AllowanceChargeType[]
     */
    public function getFreightAllowanceCharges(): array
    {
        return $this->freightAllowanceCharges;
    }

    /**
     * @param AllowanceChargeType[] $freightAllowanceCharges
     * @return void
     */
    public function setFreightAllowanceCharges(array $freightAllowanceCharges): void
    {
        $this->freightAllowanceCharges = $freightAllowanceCharges;
    }

    /**
     * @return TransportEquipmentType[]
     */
    public function getAttachedTransportEquipments(): array
    {
        return $this->attachedTransportEquipments;
    }

    /**
     * @param TransportEquipmentType[] $attachedTransportEquipments
     * @return void
     */
    public function setAttachedTransportEquipments(array $attachedTransportEquipments): void
    {
        $this->attachedTransportEquipments = $attachedTransportEquipments;
    }

    public function getDelivery(): ?DeliveryType
    {
        return $this->delivery;
    }

    public function setDelivery(?DeliveryType $delivery): void
    {
        $this->delivery = $delivery;
    }

    public function getPickup(): ?PickupType
    {
        return $this->pickup;
    }

    public function setPickup(?PickupType $pickup): void
    {
        $this->pickup = $pickup;
    }

    public function getDespatch(): ?DespatchType
    {
        return $this->despatch;
    }

    public function setDespatch(?DespatchType $despatch): void
    {
        $this->despatch = $despatch;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getShipmentDocumentReferences(): array
    {
        return $this->shipmentDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $shipmentDocumentReferences
     * @return void
     */
    public function setShipmentDocumentReferences(array $shipmentDocumentReferences): void
    {
        $this->shipmentDocumentReferences = $shipmentDocumentReferences;
    }

    /**
     * @return TransportEquipmentType[]
     */
    public function getContainedInTransportEquipments(): array
    {
        return $this->containedInTransportEquipments;
    }

    /**
     * @param TransportEquipmentType[] $containedInTransportEquipments
     * @return void
     */
    public function setContainedInTransportEquipments(array $containedInTransportEquipments): void
    {
        $this->containedInTransportEquipments = $containedInTransportEquipments;
    }

    /**
     * @return PackageType[]
     */
    public function getPackages(): array
    {
        return $this->packages;
    }

    /**
     * @param PackageType[] $packages
     * @return void
     */
    public function setPackages(array $packages): void
    {
        $this->packages = $packages;
    }

    /**
     * @return GoodsItemType[]
     */
    public function getGoodsItems(): array
    {
        return $this->goodsItems;
    }

    /**
     * @param GoodsItemType[] $goodsItems
     * @return void
     */
    public function setGoodsItems(array $goodsItems): void
    {
        $this->goodsItems = $goodsItems;
    }
}