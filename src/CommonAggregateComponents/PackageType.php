<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class PackageType
{
    /**
     * @param TextType[] $packingMaterials
     * @param PackageType[] $containedPackages
     * @param GoodsItemType[] $goodsItems
     * @param DimensionType[] $measurementDimensions
     * @param DeliveryUnitType[] $deliveryUnits
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Quantity')]
        protected ?QuantityType $quantity = null,
        #[SerializedName('ReturnableMaterialIndicator')]
        protected ?Indicator $returnableMaterialIndicator = null,
        #[SerializedName('PackageLevelCode')]
        protected ?CodeType $packageLevelCode = null,
        #[SerializedName('PackagingTypeCode')]
        protected ?CodeType $packagingTypeCode = null,
        #[SerializedName('PackingMaterial')]
        protected array $packingMaterials = [],
        #[SerializedName('TraceID')]
        protected ?IdentifierType $traceID = null,
        #[SerializedName('ContainedPackage')]
        protected array $containedPackages = [],
        #[SerializedName('ContainingTransportEquipment')]
        protected ?TransportEquipmentType $containingTransportEquipment = null,
        #[SerializedName('GoodsItem')]
        protected array $goodsItems = [],
        #[SerializedName('MeasurementDimension')]
        protected array $measurementDimensions = [],
        #[SerializedName('DeliveryUnit')]
        protected array $deliveryUnits = [],
        #[SerializedName('Delivery')]
        protected ?DeliveryType $delivery = null,
        #[SerializedName('Pickup')]
        protected ?PickupType $pickup = null,
        #[SerializedName('Despatch')]
        protected ?DespatchType $despatch = null,
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

    public function getQuantity(): ?QuantityType
    {
        return $this->quantity;
    }

    public function setQuantity(?QuantityType $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getReturnableMaterialIndicator(): ?Indicator
    {
        return $this->returnableMaterialIndicator;
    }

    public function setReturnableMaterialIndicator(?Indicator $returnableMaterialIndicator): void
    {
        $this->returnableMaterialIndicator = $returnableMaterialIndicator;
    }

    public function getPackageLevelCode(): ?CodeType
    {
        return $this->packageLevelCode;
    }

    public function setPackageLevelCode(?CodeType $packageLevelCode): void
    {
        $this->packageLevelCode = $packageLevelCode;
    }

    public function getPackagingTypeCode(): ?CodeType
    {
        return $this->packagingTypeCode;
    }

    public function setPackagingTypeCode(?CodeType $packagingTypeCode): void
    {
        $this->packagingTypeCode = $packagingTypeCode;
    }

    public function getPackingMaterials(): array
    {
        return $this->packingMaterials;
    }

    public function setPackingMaterials(array $packingMaterials): void
    {
        $this->packingMaterials = $packingMaterials;
    }

    public function getTraceID(): ?IdentifierType
    {
        return $this->traceID;
    }

    public function setTraceID(?IdentifierType $traceID): void
    {
        $this->traceID = $traceID;
    }

    public function getContainedPackages(): array
    {
        return $this->containedPackages;
    }

    public function setContainedPackages(array $containedPackages): void
    {
        $this->containedPackages = $containedPackages;
    }

    public function getContainingTransportEquipment(): ?TransportEquipmentType
    {
        return $this->containingTransportEquipment;
    }

    public function setContainingTransportEquipment(?TransportEquipmentType $containingTransportEquipment): void
    {
        $this->containingTransportEquipment = $containingTransportEquipment;
    }

    public function getGoodsItems(): array
    {
        return $this->goodsItems;
    }

    public function setGoodsItems(array $goodsItems): void
    {
        $this->goodsItems = $goodsItems;
    }

    public function getMeasurementDimensions(): array
    {
        return $this->measurementDimensions;
    }

    public function setMeasurementDimensions(array $measurementDimensions): void
    {
        $this->measurementDimensions = $measurementDimensions;
    }

    public function getDeliveryUnits(): array
    {
        return $this->deliveryUnits;
    }

    public function setDeliveryUnits(array $deliveryUnits): void
    {
        $this->deliveryUnits = $deliveryUnits;
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
}