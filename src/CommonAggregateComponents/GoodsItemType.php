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

class GoodsItemType
{
    /**
     * @param TextType[] $descriptions
     * @param ItemType[] $items
     * @param GoodsItemContainerType[] $goodsItemContainers
     * @param AllowanceChargeType[] $freightAllowanceCharges
     * @param InvoiceLineType[] $invoiceLines
     * @param TemperatureType[] $temperatures
     * @param GoodsItemType[] $containedGoodsItems
     * @param DimensionType[] $measurementDimensions
     * @param PackageType[] $containingPackages
     */
    public function __construct(

        #[SerializedName("ID")]
        protected ?IdentifierType $iD = null,
        #[SerializedName("SequenceNumberID")]
        protected ?IdentifierType $sequenceNumberID = null,
        #[SerializedName("Description")]
        protected array $descriptions = [],
        #[SerializedName("HazardousRiskIndicator")]
        protected ?Indicator $hazardousRiskIndicator = null,
        #[SerializedName("DeclaredCustomsValueAmount")]
        protected ?AmountType $declaredCustomsValueAmount = null,
        #[SerializedName("DeclaredForCarriageValueAmount")]
        protected ?AmountType $declaredForCarriageValueAmount = null,
        #[SerializedName("DeclaredStatisticsValueAmount")]
        protected ?AmountType $declaredStatisticsValueAmount = null,
        #[SerializedName("FreeOnBoardValueAmount")]
        protected ?AmountType $freeOnBoardValueAmount = null,
        #[SerializedName("InsuranceValueAmount")]
        protected ?AmountType $insuranceValueAmount = null,
        #[SerializedName("ValueAmount")]
        protected ?AmountType $valueAmount = null,
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
        #[SerializedName("Quantity")]
        protected ?QuantityType $quantity = null,
        #[SerializedName("PreferenceCriterionCode")]
        protected ?CodeType $preferenceCriterionCode = null,
        #[SerializedName("RequiredCustomsID")]
        protected ?IdentifierType $requiredCustomsID = null,
        #[SerializedName("CustomsStatusCode")]
        protected ?CodeType $customsStatusCode = null,
        #[SerializedName("CustomsTariffQuantity")]
        protected ?QuantityType $customsTariffQuantity = null,
        #[SerializedName("CustomsImportClassifiedIndicator")]
        protected ?Indicator $customsImportClassifiedIndicator = null,
        #[SerializedName("ChargeableQuantity")]
        protected ?QuantityType $chargeableQuantity = null,
        #[SerializedName("ReturnableQuantity")]
        protected ?QuantityType $returnableQuantity = null,
        #[SerializedName("TraceID")]
        protected ?IdentifierType $traceID = null,
        #[SerializedName("Item")]
        protected array $items = [],
        #[SerializedName("GoodsItemContainer")]
        protected array $goodsItemContainers = [],
        #[SerializedName("FreightAllowanceCharge")]
        protected array $freightAllowanceCharges = [],
        #[SerializedName("InvoiceLine")]
        protected array $invoiceLines = [],
        #[SerializedName("Temperature")]
        protected array $temperatures = [],
        #[SerializedName("ContainedGoodsItem")]
        protected array $containedGoodsItems = [],
        #[SerializedName("OriginAddress")]
        protected ?AddressType $originAddress = null,
        #[SerializedName("Delivery")]
        protected ?DeliveryType $delivery = null,
        #[SerializedName("Pickup")]
        protected ?PickupType $pickup = null,
        #[SerializedName("Despatch")]
        protected ?DespatchType $despatch = null,
        #[SerializedName("MeasurementDimension")]
        protected array $measurementDimensions = [],
        #[SerializedName("ContainingPackage")]
        protected array $containingPackages = [],
        #[SerializedName("ShipmentDocumentReference")]
        protected ?DocumentReferenceType $shipmentDocumentReference = null,
        #[SerializedName("MinimumTemperature")]
        protected ?TemperatureType $minimumTemperature = null,
        #[SerializedName("MaximumTemperature")]
        protected ?TemperatureType $maximumTemperature = null,
    )
    {
    }

    public function getID(): ?IdentifierType
    {
        return $this->iD;
    }

    public function setID(?IdentifierType $iD): void
    {
        $this->iD = $iD;
    }

    public function getSequenceNumberID(): ?IdentifierType
    {
        return $this->sequenceNumberID;
    }

    public function setSequenceNumberID(?IdentifierType $sequenceNumberID): void
    {
        $this->sequenceNumberID = $sequenceNumberID;
    }

    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = $descriptions;
    }

    public function getHazardousRiskIndicator(): ?Indicator
    {
        return $this->hazardousRiskIndicator;
    }

    public function setHazardousRiskIndicator(?Indicator $hazardousRiskIndicator): void
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;
    }

    public function getDeclaredCustomsValueAmount(): ?AmountType
    {
        return $this->declaredCustomsValueAmount;
    }

    public function setDeclaredCustomsValueAmount(?AmountType $declaredCustomsValueAmount): void
    {
        $this->declaredCustomsValueAmount = $declaredCustomsValueAmount;
    }

    public function getDeclaredForCarriageValueAmount(): ?AmountType
    {
        return $this->declaredForCarriageValueAmount;
    }

    public function setDeclaredForCarriageValueAmount(?AmountType $declaredForCarriageValueAmount): void
    {
        $this->declaredForCarriageValueAmount = $declaredForCarriageValueAmount;
    }

    public function getDeclaredStatisticsValueAmount(): ?AmountType
    {
        return $this->declaredStatisticsValueAmount;
    }

    public function setDeclaredStatisticsValueAmount(?AmountType $declaredStatisticsValueAmount): void
    {
        $this->declaredStatisticsValueAmount = $declaredStatisticsValueAmount;
    }

    public function getFreeOnBoardValueAmount(): ?AmountType
    {
        return $this->freeOnBoardValueAmount;
    }

    public function setFreeOnBoardValueAmount(?AmountType $freeOnBoardValueAmount): void
    {
        $this->freeOnBoardValueAmount = $freeOnBoardValueAmount;
    }

    public function getInsuranceValueAmount(): ?AmountType
    {
        return $this->insuranceValueAmount;
    }

    public function setInsuranceValueAmount(?AmountType $insuranceValueAmount): void
    {
        $this->insuranceValueAmount = $insuranceValueAmount;
    }

    public function getValueAmount(): ?AmountType
    {
        return $this->valueAmount;
    }

    public function setValueAmount(?AmountType $valueAmount): void
    {
        $this->valueAmount = $valueAmount;
    }

    public function getGrossWeightMeasure(): ?MeasureType
    {
        return $this->grossWeightMeasure;
    }

    public function setGrossWeightMeasure(?MeasureType $grossWeightMeasure): void
    {
        $this->grossWeightMeasure = $grossWeightMeasure;
    }

    public function getNetWeightMeasure(): ?MeasureType
    {
        return $this->netWeightMeasure;
    }

    public function setNetWeightMeasure(?MeasureType $netWeightMeasure): void
    {
        $this->netWeightMeasure = $netWeightMeasure;
    }

    public function getNetNetWeightMeasure(): ?MeasureType
    {
        return $this->netNetWeightMeasure;
    }

    public function setNetNetWeightMeasure(?MeasureType $netNetWeightMeasure): void
    {
        $this->netNetWeightMeasure = $netNetWeightMeasure;
    }

    public function getChargeableWeightMeasure(): ?MeasureType
    {
        return $this->chargeableWeightMeasure;
    }

    public function setChargeableWeightMeasure(?MeasureType $chargeableWeightMeasure): void
    {
        $this->chargeableWeightMeasure = $chargeableWeightMeasure;
    }

    public function getGrossVolumeMeasure(): ?MeasureType
    {
        return $this->grossVolumeMeasure;
    }

    public function setGrossVolumeMeasure(?MeasureType $grossVolumeMeasure): void
    {
        $this->grossVolumeMeasure = $grossVolumeMeasure;
    }

    public function getNetVolumeMeasure(): ?MeasureType
    {
        return $this->netVolumeMeasure;
    }

    public function setNetVolumeMeasure(?MeasureType $netVolumeMeasure): void
    {
        $this->netVolumeMeasure = $netVolumeMeasure;
    }

    public function getQuantity(): ?QuantityType
    {
        return $this->quantity;
    }

    public function setQuantity(?QuantityType $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPreferenceCriterionCode(): ?CodeType
    {
        return $this->preferenceCriterionCode;
    }

    public function setPreferenceCriterionCode(?CodeType $preferenceCriterionCode): void
    {
        $this->preferenceCriterionCode = $preferenceCriterionCode;
    }

    public function getRequiredCustomsID(): ?IdentifierType
    {
        return $this->requiredCustomsID;
    }

    public function setRequiredCustomsID(?IdentifierType $requiredCustomsID): void
    {
        $this->requiredCustomsID = $requiredCustomsID;
    }

    public function getCustomsStatusCode(): ?CodeType
    {
        return $this->customsStatusCode;
    }

    public function setCustomsStatusCode(?CodeType $customsStatusCode): void
    {
        $this->customsStatusCode = $customsStatusCode;
    }

    public function getCustomsTariffQuantity(): ?QuantityType
    {
        return $this->customsTariffQuantity;
    }

    public function setCustomsTariffQuantity(?QuantityType $customsTariffQuantity): void
    {
        $this->customsTariffQuantity = $customsTariffQuantity;
    }

    public function getCustomsImportClassifiedIndicator(): ?Indicator
    {
        return $this->customsImportClassifiedIndicator;
    }

    public function setCustomsImportClassifiedIndicator(?Indicator $customsImportClassifiedIndicator): void
    {
        $this->customsImportClassifiedIndicator = $customsImportClassifiedIndicator;
    }

    public function getChargeableQuantity(): ?QuantityType
    {
        return $this->chargeableQuantity;
    }

    public function setChargeableQuantity(?QuantityType $chargeableQuantity): void
    {
        $this->chargeableQuantity = $chargeableQuantity;
    }

    public function getReturnableQuantity(): ?QuantityType
    {
        return $this->returnableQuantity;
    }

    public function setReturnableQuantity(?QuantityType $returnableQuantity): void
    {
        $this->returnableQuantity = $returnableQuantity;
    }

    public function getTraceID(): ?IdentifierType
    {
        return $this->traceID;
    }

    public function setTraceID(?IdentifierType $traceID): void
    {
        $this->traceID = $traceID;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function getGoodsItemContainers(): array
    {
        return $this->goodsItemContainers;
    }

    public function setGoodsItemContainers(array $goodsItemContainers): void
    {
        $this->goodsItemContainers = $goodsItemContainers;
    }

    public function getFreightAllowanceCharges(): array
    {
        return $this->freightAllowanceCharges;
    }

    public function setFreightAllowanceCharges(array $freightAllowanceCharges): void
    {
        $this->freightAllowanceCharges = $freightAllowanceCharges;
    }

    public function getInvoiceLines(): array
    {
        return $this->invoiceLines;
    }

    public function setInvoiceLines(array $invoiceLines): void
    {
        $this->invoiceLines = $invoiceLines;
    }

    public function getTemperatures(): array
    {
        return $this->temperatures;
    }

    public function setTemperatures(array $temperatures): void
    {
        $this->temperatures = $temperatures;
    }

    public function getContainedGoodsItems(): array
    {
        return $this->containedGoodsItems;
    }

    public function setContainedGoodsItems(array $containedGoodsItems): void
    {
        $this->containedGoodsItems = $containedGoodsItems;
    }

    public function getOriginAddress(): ?AddressType
    {
        return $this->originAddress;
    }

    public function setOriginAddress(?AddressType $originAddress): void
    {
        $this->originAddress = $originAddress;
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

    public function getMeasurementDimensions(): array
    {
        return $this->measurementDimensions;
    }

    public function setMeasurementDimensions(array $measurementDimensions): void
    {
        $this->measurementDimensions = $measurementDimensions;
    }

    public function getContainingPackages(): array
    {
        return $this->containingPackages;
    }

    public function setContainingPackages(array $containingPackages): void
    {
        $this->containingPackages = $containingPackages;
    }

    public function getShipmentDocumentReference(): ?DocumentReferenceType
    {
        return $this->shipmentDocumentReference;
    }

    public function setShipmentDocumentReference(?DocumentReferenceType $shipmentDocumentReference): void
    {
        $this->shipmentDocumentReference = $shipmentDocumentReference;
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


}