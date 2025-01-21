<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\NumericType;
use UBL\UnqualifiedDataTypes\TextType;

class TransportationServiceType
{

    /**
     * @param TextType[] $transportationServiceDescriptions
     * @param TransportEquipmentType[] $transportEquipments
     * @param TransportEquipmentType[] $supportedTransportEquipments
     * @param TransportEquipmentType[] $unsupportedTransportEquipments
     * @param CommodityClassificationType[] $commodityClassification
     * @param CommodityClassificationType[] $supportedCommodityClassifications
     * @param CommodityClassificationType[] $unsupportedCommodityClassifications
     * @param ShipmentStageType[] $shipmentStages
     * @param TransportEventType[] $transportEvents
     * @param EnvironmentalEmissionType[] $environmentalEmissions
     * @param ServiceFrequencyType[] $scheduledServiceFrequencies
     */
    public function __construct(
        #[SerializedName('TransportServiceCode')]
        protected ?CodeType $transportServiceCode = null,
        #[SerializedName('TariffClassCode')]
        protected ?CodeType $tariffClassCode = null,
        #[SerializedName('Priority')]
        protected ?TextType $priority = null,
        #[SerializedName('FreightRateClassCode')]
        protected ?CodeType $freightRateClassCode = null,
        #[SerializedName('TransportationServiceDescription')]
        protected array $transportationServiceDescriptions = [],
        #[SerializedName('TransportationServiceDetailsURI')]
        protected ?IdentifierType $transportationServiceDetailsURI = null,
        #[SerializedName('NominationDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $nominationDate = null,
        #[SerializedName('NominationTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $nominationTime = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('SequenceNumeric')]
        protected ?NumericType $sequenceNumeric = null,
        #[SerializedName('TransportEquipment')]
        protected array $transportEquipments = [],
        #[SerializedName('SupportedTransportEquipment')]
        protected array $supportedTransportEquipments = [],
        #[SerializedName('UnsupportedTransportEquipment')]
        protected array $unsupportedTransportEquipments = [],
        #[SerializedName('CommodityClassification')]
        protected array $commodityClassification = [],
        #[SerializedName('SupportedCommodityClassification')]
        protected array $supportedCommodityClassifications = [],
        #[SerializedName('UnsupportedCommodityClassification')]
        protected array $unsupportedCommodityClassifications = [],
        #[SerializedName('TotalCapacityDimension')]
        protected ?DimensionType $totalCapacityDimension = null,
        #[SerializedName('ShipmentStage')]
        protected array $shipmentStages = [],
        #[SerializedName('TransportEvent')]
        protected array $transportEvents = [],
        #[SerializedName('ResponsibleTransportServiceProviderParty')]
        protected ?PartyType $responsibleTransportServiceProviderParty = null,
        #[SerializedName('EnvironmentalEmission')]
        protected array $environmentalEmissions = [],
        #[SerializedName('EstimatedDurationPeriod')]
        protected ?PeriodType $estimatedDurationPeriod = null,
        #[SerializedName('ScheduledServiceFrequency')]
        protected array $scheduledServiceFrequencies = []
    )
    {
    }

    public function getTransportServiceCode(): ?CodeType
    {
        return $this->transportServiceCode;
    }

    public function setTransportServiceCode(?CodeType $transportServiceCode): void
    {
        $this->transportServiceCode = $transportServiceCode;
    }

    public function getTariffClassCode(): ?CodeType
    {
        return $this->tariffClassCode;
    }

    public function setTariffClassCode(?CodeType $tariffClassCode): void
    {
        $this->tariffClassCode = $tariffClassCode;
    }

    public function getPriority(): ?TextType
    {
        return $this->priority;
    }

    public function setPriority(?TextType $priority): void
    {
        $this->priority = $priority;
    }

    public function getFreightRateClassCode(): ?CodeType
    {
        return $this->freightRateClassCode;
    }

    public function setFreightRateClassCode(?CodeType $freightRateClassCode): void
    {
        $this->freightRateClassCode = $freightRateClassCode;
    }

    /**
     * @return TextType[]
     */
    public function getTransportationServiceDescriptions(): array
    {
        return $this->transportationServiceDescriptions;
    }

    /**
     * @param TextType[] $transportationServiceDescriptions
     * @return void
     */
    public function setTransportationServiceDescriptions(array $transportationServiceDescriptions): void
    {
        $this->transportationServiceDescriptions = $transportationServiceDescriptions;
    }

    public function getTransportationServiceDetailsURI(): ?IdentifierType
    {
        return $this->transportationServiceDetailsURI;
    }

    public function setTransportationServiceDetailsURI(?IdentifierType $transportationServiceDetailsURI): void
    {
        $this->transportationServiceDetailsURI = $transportationServiceDetailsURI;
    }

    public function getNominationDate(): ?DateTimeInterface
    {
        return $this->nominationDate;
    }

    public function setNominationDate(?DateTimeInterface $nominationDate): void
    {
        $this->nominationDate = $nominationDate;
    }

    public function getNominationTime(): ?DateTimeInterface
    {
        return $this->nominationTime;
    }

    public function setNominationTime(?DateTimeInterface $nominationTime): void
    {
        $this->nominationTime = $nominationTime;
    }

    public function getName(): ?NameType
    {
        return $this->name;
    }

    public function setName(?NameType $name): void
    {
        $this->name = $name;
    }

    public function getSequenceNumeric(): ?NumericType
    {
        return $this->sequenceNumeric;
    }

    public function setSequenceNumeric(?NumericType $sequenceNumeric): void
    {
        $this->sequenceNumeric = $sequenceNumeric;
    }

    /**
     * @return TransportEquipmentType[]
     */
    public function getTransportEquipments(): array
    {
        return $this->transportEquipments;
    }

    /**
     * @param TransportEquipmentType[] $transportEquipments
     * @return void
     */
    public function setTransportEquipments(array $transportEquipments): void
    {
        $this->transportEquipments = $transportEquipments;
    }

    /**
     * @return TransportEquipmentType[]
     */
    public function getSupportedTransportEquipments(): array
    {
        return $this->supportedTransportEquipments;
    }

    /**
     * @param TransportEquipmentType[] $supportedTransportEquipments
     * @return void
     */
    public function setSupportedTransportEquipments(array $supportedTransportEquipments): void
    {
        $this->supportedTransportEquipments = $supportedTransportEquipments;
    }

    /**
     * @return CommodityClassificationType[]
     */
    public function getCommodityClassification(): array
    {
        return $this->commodityClassification;
    }

    /**
     * @param CommodityClassificationType[] $commodityClassification
     * @return void
     */
    public function setCommodityClassification(array $commodityClassification): void
    {
        $this->commodityClassification = $commodityClassification;
    }

    /**
     * @return TransportEquipmentType[]
     */
    public function getUnsupportedTransportEquipments(): array
    {
        return $this->unsupportedTransportEquipments;
    }

    /**
     * @param TransportEquipmentType[] $unsupportedTransportEquipments
     * @return void
     */
    public function setUnsupportedTransportEquipments(array $unsupportedTransportEquipments): void
    {
        $this->unsupportedTransportEquipments = $unsupportedTransportEquipments;
    }

    /**
     * @return CommodityClassificationType[]
     */
    public function getSupportedCommodityClassifications(): array
    {
        return $this->supportedCommodityClassifications;
    }

    /**
     * @param CommodityClassificationType[] $supportedCommodityClassifications
     * @return void
     */
    public function setSupportedCommodityClassifications(array $supportedCommodityClassifications): void
    {
        $this->supportedCommodityClassifications = $supportedCommodityClassifications;
    }

    /**
     * @return CommodityClassificationType[]
     */
    public function getUnsupportedCommodityClassifications(): array
    {
        return $this->unsupportedCommodityClassifications;
    }

    /**
     * @param CommodityClassificationType[] $unsupportedCommodityClassifications
     * @return void
     */
    public function setUnsupportedCommodityClassifications(array $unsupportedCommodityClassifications): void
    {
        $this->unsupportedCommodityClassifications = $unsupportedCommodityClassifications;
    }

    public function getTotalCapacityDimension(): ?DimensionType
    {
        return $this->totalCapacityDimension;
    }

    public function setTotalCapacityDimension(?DimensionType $totalCapacityDimension): void
    {
        $this->totalCapacityDimension = $totalCapacityDimension;
    }

    /**
     * @return ShipmentStageType[]
     */
    public function getShipmentStages(): array
    {
        return $this->shipmentStages;
    }

    /**
     * @param ShipmentStageType[] $shipmentStages
     * @return void
     */
    public function setShipmentStages(array $shipmentStages): void
    {
        $this->shipmentStages = $shipmentStages;
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

    public function getResponsibleTransportServiceProviderParty(): ?PartyType
    {
        return $this->responsibleTransportServiceProviderParty;
    }

    public function setResponsibleTransportServiceProviderParty(?PartyType $responsibleTransportServiceProviderParty): void
    {
        $this->responsibleTransportServiceProviderParty = $responsibleTransportServiceProviderParty;
    }

    /**
     * @return EnvironmentalEmissionType[]
     */
    public function getEnvironmentalEmissions(): array
    {
        return $this->environmentalEmissions;
    }

    /**
     * @param EnvironmentalEmissionType[] $environmentalEmissions
     * @return void
     */
    public function setEnvironmentalEmissions(array $environmentalEmissions): void
    {
        $this->environmentalEmissions = $environmentalEmissions;
    }

    public function getEstimatedDurationPeriod(): ?PeriodType
    {
        return $this->estimatedDurationPeriod;
    }

    public function setEstimatedDurationPeriod(?PeriodType $estimatedDurationPeriod): void
    {
        $this->estimatedDurationPeriod = $estimatedDurationPeriod;
    }

    /**
     * @return ServiceFrequencyType[]
     */
    public function getScheduledServiceFrequencies(): array
    {
        return $this->scheduledServiceFrequencies;
    }

    /**
     * @param ServiceFrequencyType[] $scheduledServiceFrequencies
     * @return void
     */
    public function setScheduledServiceFrequencies(array $scheduledServiceFrequencies): void
    {
        $this->scheduledServiceFrequencies = $scheduledServiceFrequencies;
    }
}