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

class ShipmentType
{
    /**
     * @param TextType[] $handlingInstructions
     * @param TextType[] $information
     * @param TextType[] $specialInstructions
     * @param TextType[] $deliveryInstructions
     * @param ConsignmentType[] $consignments
     * @param GoodsItemType[] $goodsItems
     * @param ShipmentStageType[] $shipmentStages
     * @param TransportHandlingUnitType[] $transportHandlingUnits
     * @param AllowanceChargeType[] $freightAllowanceCharges
     */
    public function __construct(

        #[SerializedName("ID")]
        protected ?IdentifierType $iD = null,
        #[SerializedName("ShippingPriorityLevelCode")]
        protected ?CodeType $shippingPriorityLevelCode = null,
        #[SerializedName("HandlingCode")]
        protected ?CodeType $handlingCode = null,
        #[SerializedName("HandlingInstructions")]
        protected array $handlingInstructions = [],
        #[SerializedName("Information")]
        protected array $information = [],
        #[SerializedName("GrossWeightMeasure")]
        protected ?MeasureType $grossWeightMeasure = null,
        #[SerializedName("NetWeightMeasure")]
        protected ?MeasureType $netWeightMeasure = null,
        #[SerializedName("NetNetWeightMeasure")]
        protected ?MeasureType $netNetWeightMeasure = null,
        #[SerializedName("GrossVolumeMeasure")]
        protected ?MeasureType $grossVolumeMeasure = null,
        #[SerializedName("NetVolumeMeasure")]
        protected ?MeasureType $netVolumeMeasure = null,
        #[SerializedName("TotalGoodsItemQuantity")]
        protected ?QuantityType $totalGoodsItemQuantity = null,
        #[SerializedName("TotalTransportHandlingUnitQuantity")]
        protected ?QuantityType $totalTransportHandlingUnitQuantity = null,
        #[SerializedName("InsuranceValueAmount")]
        protected ?AmountType $insuranceValueAmount = null,
        #[SerializedName("DeclaredCustomsValueAmount")]
        protected ?AmountType $declaredCustomsValueAmount = null,
        #[SerializedName("DeclaredForCarriageValueAmount")]
        protected ?AmountType $declaredForCarriageValueAmount = null,
        #[SerializedName("DeclaredStatisticsValueAmount")]
        protected ?AmountType $declaredStatisticsValueAmount = null,
        #[SerializedName("FreeOnBoardValueAmount")]
        protected ?AmountType $freeOnBoardValueAmount = null,
        #[SerializedName("SpecialInstructions")]
        protected array $specialInstructions = [],
        #[SerializedName("DeliveryInstructions")]
        protected array $deliveryInstructions = [],
        #[SerializedName("SplitConsignmentIndicator")]
        protected ?Indicator $splitConsignmentIndicator = null,
        #[SerializedName("ConsignmentQuantity")]
        protected ?QuantityType $consignmentQuantity = null,
        #[SerializedName("Consignment")]
        protected array $consignments = [],
        #[SerializedName("GoodsItem")]
        protected array $goodsItems = [],
        #[SerializedName("ShipmentStage")]
        protected array $shipmentStages = [],
        #[SerializedName("Delivery")]
        protected ?DeliveryType $delivery = null,
        #[SerializedName("TransportHandlingUnit")]
        protected array $transportHandlingUnits = [],
        #[SerializedName("ReturnAddress")]
        protected ?AddressType $returnAddress = null,
        #[SerializedName("OriginAddress")]
        protected ?AddressType $originAddress = null,
        #[SerializedName("FirstArrivalPortLocation")]
        protected ?LocationType $firstArrivalPortLocation = null,
        #[SerializedName("LastExitPortLocation")]
        protected ?LocationType $lastExitPortLocation = null,
        #[SerializedName("ExportCountry")]
        protected ?CountryType $exportCountry = null,
        #[SerializedName("FreightAllowanceCharge")]
        protected array $freightAllowanceCharges = [],
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

    public function getShippingPriorityLevelCode(): ?CodeType
    {
        return $this->shippingPriorityLevelCode;
    }

    public function setShippingPriorityLevelCode(?CodeType $shippingPriorityLevelCode): void
    {
        $this->shippingPriorityLevelCode = $shippingPriorityLevelCode;
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

    public function getInformation(): array
    {
        return $this->information;
    }

    public function setInformation(array $information): void
    {
        $this->information = $information;
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

    public function getTotalGoodsItemQuantity(): ?QuantityType
    {
        return $this->totalGoodsItemQuantity;
    }

    public function setTotalGoodsItemQuantity(?QuantityType $totalGoodsItemQuantity): void
    {
        $this->totalGoodsItemQuantity = $totalGoodsItemQuantity;
    }

    public function getTotalTransportHandlingUnitQuantity(): ?QuantityType
    {
        return $this->totalTransportHandlingUnitQuantity;
    }

    public function setTotalTransportHandlingUnitQuantity(?QuantityType $totalTransportHandlingUnitQuantity): void
    {
        $this->totalTransportHandlingUnitQuantity = $totalTransportHandlingUnitQuantity;
    }

    public function getInsuranceValueAmount(): ?AmountType
    {
        return $this->insuranceValueAmount;
    }

    public function setInsuranceValueAmount(?AmountType $insuranceValueAmount): void
    {
        $this->insuranceValueAmount = $insuranceValueAmount;
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

    public function getSpecialInstructions(): array
    {
        return $this->specialInstructions;
    }

    public function setSpecialInstructions(array $specialInstructions): void
    {
        $this->specialInstructions = $specialInstructions;
    }

    public function getDeliveryInstructions(): array
    {
        return $this->deliveryInstructions;
    }

    public function setDeliveryInstructions(array $deliveryInstructions): void
    {
        $this->deliveryInstructions = $deliveryInstructions;
    }

    public function getSplitConsignmentIndicator(): ?Indicator
    {
        return $this->splitConsignmentIndicator;
    }

    public function setSplitConsignmentIndicator(?Indicator $splitConsignmentIndicator): void
    {
        $this->splitConsignmentIndicator = $splitConsignmentIndicator;
    }

    public function getConsignmentQuantity(): ?QuantityType
    {
        return $this->consignmentQuantity;
    }

    public function setConsignmentQuantity(?QuantityType $consignmentQuantity): void
    {
        $this->consignmentQuantity = $consignmentQuantity;
    }

    public function getConsignments(): array
    {
        return $this->consignments;
    }

    public function setConsignments(array $consignments): void
    {
        $this->consignments = $consignments;
    }

    public function getGoodsItems(): array
    {
        return $this->goodsItems;
    }

    public function setGoodsItems(array $goodsItems): void
    {
        $this->goodsItems = $goodsItems;
    }

    public function getShipmentStages(): array
    {
        return $this->shipmentStages;
    }

    public function setShipmentStages(array $shipmentStages): void
    {
        $this->shipmentStages = $shipmentStages;
    }

    public function getDelivery(): ?DeliveryType
    {
        return $this->delivery;
    }

    public function setDelivery(?DeliveryType $delivery): void
    {
        $this->delivery = $delivery;
    }

    public function getTransportHandlingUnits(): array
    {
        return $this->transportHandlingUnits;
    }

    public function setTransportHandlingUnits(array $transportHandlingUnits): void
    {
        $this->transportHandlingUnits = $transportHandlingUnits;
    }

    public function getReturnAddress(): ?AddressType
    {
        return $this->returnAddress;
    }

    public function setReturnAddress(?AddressType $returnAddress): void
    {
        $this->returnAddress = $returnAddress;
    }

    public function getOriginAddress(): ?AddressType
    {
        return $this->originAddress;
    }

    public function setOriginAddress(?AddressType $originAddress): void
    {
        $this->originAddress = $originAddress;
    }

    public function getFirstArrivalPortLocation(): ?LocationType
    {
        return $this->firstArrivalPortLocation;
    }

    public function setFirstArrivalPortLocation(?LocationType $firstArrivalPortLocation): void
    {
        $this->firstArrivalPortLocation = $firstArrivalPortLocation;
    }

    public function getLastExitPortLocation(): ?LocationType
    {
        return $this->lastExitPortLocation;
    }

    public function setLastExitPortLocation(?LocationType $lastExitPortLocation): void
    {
        $this->lastExitPortLocation = $lastExitPortLocation;
    }

    public function getExportCountry(): ?CountryType
    {
        return $this->exportCountry;
    }

    public function setExportCountry(?CountryType $exportCountry): void
    {
        $this->exportCountry = $exportCountry;
    }

    public function getFreightAllowanceCharges(): array
    {
        return $this->freightAllowanceCharges;
    }

    public function setFreightAllowanceCharges(array $freightAllowanceCharges): void
    {
        $this->freightAllowanceCharges = $freightAllowanceCharges;
    }
}