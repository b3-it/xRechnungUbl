<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class TransportHandlingUnitType
{
    /**
     * @param TextType[] $handlingInstructions
     * @param TextType[] $damageRemarks
     * @param TextType[] $shippingMarks
     * @param DespatchLineType[] $handlingUnitDespatchLines
     * @param PackageType[] $actualPackages
     * @param ReceiptLineType[] $receivedHandlingUnitReceiptLines
     * @param TransportEquipmentType[] $transportEquipments
     * @param TransportMeansType[] $transportMeans
     * @param GoodsItemType[] $goodsItems
     * @param DocumentReferenceType[] $shipmentDocumentReferences
     * @param StatusType[] $statuses
     * @param CustomsDeclarationType[] $customsDeclarations
     * @param ShipmentType[] $referencedShipments
     * @param PackageType[] $packages
     */
    public function __construct(
        #[SerializedName("ID")]
        protected ?IdentifierType $id = null,
        #[SerializedName("TransportHandlingUnitTypeCode")]
        protected ?CodeType $transportHandlingUnitTypeCode = null,
        #[SerializedName("HandlingCode")]
        protected ?CodeType $handlingCode = null,
        #[SerializedName("HandlingInstructions")]
        protected array $handlingInstructions = [],
        #[SerializedName("HazardousRiskIndicator")]
        protected ?Indicator $hazardousRiskIndicator = null,
        #[SerializedName("TotalGoodsItemQuantity")]
        protected ?QuantityType $totalGoodsItemQuantity = null,
        #[SerializedName("TotalPackageQuantity")]
        protected ?QuantityType $totalPackageQuantity = null,
        #[SerializedName("DamageRemarks")]
        protected array $damageRemarks = [],
        #[SerializedName("ShippingMarks")]
        protected array $shippingMarks = [],

        #[SerializedName("TraceID")]
        protected ?IdentifierType $traceID = null,

        #[SerializedName("HandlingUnitDespatchLine")]
        protected array $handlingUnitDespatchLines = [],

        #[SerializedName("ActualPackage")]
        protected array $actualPackages = [],

        #[SerializedName("ReceivedHandlingUnitReceiptLine")]
        protected array $receivedHandlingUnitReceiptLines = [],

        #[SerializedName("TransportEquipment")]
        protected array $transportEquipments = [],

        #[SerializedName("TransportMeans")]
        protected array $transportMeans = [],

        #[SerializedName("HazardousGoodsTransit")]
        protected array $hazardousGoodsTransits = [],
        #[SerializedName("MeasurementDimension")]
        protected array $measurementDimensions = [],
        #[SerializedName("MinimumTemperature")]
        protected ?TemperatureType $minimumTemperature = null,
        #[SerializedName("MaximumTemperature")]
        protected ?TemperatureType $maximumTemperature = null,
        #[SerializedName("GoodsItem")]
        protected array $goodsItems = [],
        #[SerializedName("FloorSpaceMeasurementDimension")]
        protected ?DimensionType $floorSpaceMeasurementDimension = null,
        #[SerializedName("PalletSpaceMeasurementDimension")]
        protected ?DimensionType $palletSpaceMeasurementDimension = null,
        #[SerializedName("ShipmentDocumentReference")]
        protected array $shipmentDocumentReferences = [],
        #[SerializedName("Status")]
        protected array $statuses = [],
        #[SerializedName("CustomsDeclaration")]
        protected array $customsDeclarations = [],
        #[SerializedName("ReferencedShipment")]
        protected array $referencedShipments = [],
        #[SerializedName("Package")]
        protected array $packages = [],
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

    public function getTransportHandlingUnitTypeCode(): ?CodeType
    {
        return $this->transportHandlingUnitTypeCode;
    }

    public function setTransportHandlingUnitTypeCode(?CodeType $transportHandlingUnitTypeCode): void
    {
        $this->transportHandlingUnitTypeCode = $transportHandlingUnitTypeCode;
    }

    public function getHandlingCode(): ?CodeType
    {
        return $this->handlingCode;
    }

    public function setHandlingCode(?CodeType $handlingCode): void
    {
        $this->handlingCode = $handlingCode;
    }

    public function getHandlingInstructions(): array
    {
        return $this->handlingInstructions;
    }

    public function setHandlingInstructions(array $handlingInstructions): void
    {
        $this->handlingInstructions = $handlingInstructions;
    }

    public function getHazardousRiskIndicator(): ?Indicator
    {
        return $this->hazardousRiskIndicator;
    }

    public function setHazardousRiskIndicator(?Indicator $hazardousRiskIndicator): void
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;
    }

    public function getTotalGoodsItemQuantity(): ?QuantityType
    {
        return $this->totalGoodsItemQuantity;
    }

    public function setTotalGoodsItemQuantity(?QuantityType $totalGoodsItemQuantity): void
    {
        $this->totalGoodsItemQuantity = $totalGoodsItemQuantity;
    }

    public function getTotalPackageQuantity(): ?QuantityType
    {
        return $this->totalPackageQuantity;
    }

    public function setTotalPackageQuantity(?QuantityType $totalPackageQuantity): void
    {
        $this->totalPackageQuantity = $totalPackageQuantity;
    }

    public function getDamageRemarks(): array
    {
        return $this->damageRemarks;
    }

    public function setDamageRemarks(array $damageRemarks): void
    {
        $this->damageRemarks = $damageRemarks;
    }

    public function getShippingMarks(): array
    {
        return $this->shippingMarks;
    }

    public function setShippingMarks(array $shippingMarks): void
    {
        $this->shippingMarks = $shippingMarks;
    }

    public function getTraceID(): ?IdentifierType
    {
        return $this->traceID;
    }

    public function setTraceID(?IdentifierType $traceID): void
    {
        $this->traceID = $traceID;
    }

    public function getHandlingUnitDespatchLines(): array
    {
        return $this->handlingUnitDespatchLines;
    }

    public function setHandlingUnitDespatchLines(array $handlingUnitDespatchLines): void
    {
        $this->handlingUnitDespatchLines = $handlingUnitDespatchLines;
    }

    public function getActualPackages(): array
    {
        return $this->actualPackages;
    }

    public function setActualPackages(array $actualPackages): void
    {
        $this->actualPackages = $actualPackages;
    }

    public function getReceivedHandlingUnitReceiptLines(): array
    {
        return $this->receivedHandlingUnitReceiptLines;
    }

    public function setReceivedHandlingUnitReceiptLines(array $receivedHandlingUnitReceiptLines): void
    {
        $this->receivedHandlingUnitReceiptLines = $receivedHandlingUnitReceiptLines;
    }

    public function getTransportEquipments(): array
    {
        return $this->transportEquipments;
    }

    public function setTransportEquipments(array $transportEquipments): void
    {
        $this->transportEquipments = $transportEquipments;
    }

    public function getTransportMeans(): array
    {
        return $this->transportMeans;
    }

    public function setTransportMeans(array $transportMeans): void
    {
        $this->transportMeans = $transportMeans;
    }

    public function getHazardousGoodsTransits(): array
    {
        return $this->hazardousGoodsTransits;
    }

    public function setHazardousGoodsTransits(array $hazardousGoodsTransits): void
    {
        $this->hazardousGoodsTransits = $hazardousGoodsTransits;
    }

    public function getMeasurementDimensions(): array
    {
        return $this->measurementDimensions;
    }

    public function setMeasurementDimensions(array $measurementDimensions): void
    {
        $this->measurementDimensions = $measurementDimensions;
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

    public function getGoodsItems(): array
    {
        return $this->goodsItems;
    }

    public function setGoodsItems(array $goodsItems): void
    {
        $this->goodsItems = $goodsItems;
    }

    public function getFloorSpaceMeasurementDimension(): ?DimensionType
    {
        return $this->floorSpaceMeasurementDimension;
    }

    public function setFloorSpaceMeasurementDimension(?DimensionType $floorSpaceMeasurementDimension): void
    {
        $this->floorSpaceMeasurementDimension = $floorSpaceMeasurementDimension;
    }

    public function getPalletSpaceMeasurementDimension(): ?DimensionType
    {
        return $this->palletSpaceMeasurementDimension;
    }

    public function setPalletSpaceMeasurementDimension(?DimensionType $palletSpaceMeasurementDimension): void
    {
        $this->palletSpaceMeasurementDimension = $palletSpaceMeasurementDimension;
    }

    public function getShipmentDocumentReferences(): array
    {
        return $this->shipmentDocumentReferences;
    }

    public function setShipmentDocumentReferences(array $shipmentDocumentReferences): void
    {
        $this->shipmentDocumentReferences = $shipmentDocumentReferences;
    }

    public function getStatuses(): array
    {
        return $this->statuses;
    }

    public function setStatuses(array $statuses): void
    {
        $this->statuses = $statuses;
    }

    public function getCustomsDeclarations(): array
    {
        return $this->customsDeclarations;
    }

    public function setCustomsDeclarations(array $customsDeclarations): void
    {
        $this->customsDeclarations = $customsDeclarations;
    }

    public function getReferencedShipments(): array
    {
        return $this->referencedShipments;
    }

    public function setReferencedShipments(array $referencedShipments): void
    {
        $this->referencedShipments = $referencedShipments;
    }

    public function getPackages(): array
    {
        return $this->packages;
    }

    public function setPackages(array $packages): void
    {
        $this->packages = $packages;
    }
}