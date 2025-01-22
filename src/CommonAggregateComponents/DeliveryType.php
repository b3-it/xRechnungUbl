<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\QuantityType;

class DeliveryType
{
    /**
     * @param PartyType[] $notifyParties
     * @param DeliveryTermsType[] $deliveryTerms
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Quantity')]
        protected ?QuantityType $quantity = null,
        #[SerializedName('MinimumQuantity')]
        protected ?QuantityType $minimumQuantity = null,
        #[SerializedName('MaximumQuantity')]
        protected ?QuantityType $maximumQuantity = null,
        #[SerializedName('ActualDeliveryDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $actualDeliveryDate = null,
        #[SerializedName('ActualDeliveryTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $actualDeliveryTime = null,
        #[SerializedName('LatestDeliveryDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $latestDeliveryDate = null,
        #[SerializedName('LatestDeliveryTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $latestDeliveryTime = null,
        #[SerializedName('DeliveryAddress')]
        protected ?AddressType $deliveryAddress = null,
        #[SerializedName('DeliveryLocation')]
        protected ?LocationType $deliveryLocation = null,
        #[SerializedName('AlternativeDeliveryLocation')]
        protected ?LocationType $alternativeDeliveryLocation = null,
        #[SerializedName('RequestedDeliveryPeriod')]
        protected ?PeriodType $requestedDeliveryPeriod = null,
        #[SerializedName('PromisedDeliveryPeriod')]
        protected ?PeriodType $promisedDeliveryPeriod = null,
        #[SerializedName('EstimatedDeliveryPeriod')]
        protected ?PeriodType $estimatedDeliveryPeriod = null,
        #[SerializedName('CarrierParty')]
        protected ?PartyType $carrierParty = null,
        #[SerializedName('DeliveryParty')]
        protected ?PartyType $deliveryParty = null,
        #[SerializedName('NotifyParty')]
        protected array $notifyParties = [],
        #[SerializedName('Despatch')]
        protected ?DespatchType $despatch = null,
        #[SerializedName('DeliveryTerms')]
        protected array $deliveryTerms = [],
        #[SerializedName('MinimumDeliveryUnit')]
        protected ?DeliveryUnitType $minimumDeliveryUnit = null,
        #[SerializedName('MaximumDeliveryUnit')]
        protected ?DeliveryUnitType $maximumDeliveryUnit = null,
        #[SerializedName('Shipment')]
        protected ?ShipmentType $shipment = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
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

    public function getMinimumQuantity(): ?QuantityType
    {
        return $this->minimumQuantity;
    }

    public function setMinimumQuantity(?QuantityType $minimumQuantity): void
    {
        $this->minimumQuantity = $minimumQuantity;
    }

    public function getMaximumQuantity(): ?QuantityType
    {
        return $this->maximumQuantity;
    }

    public function setMaximumQuantity(?QuantityType $maximumQuantity): void
    {
        $this->maximumQuantity = $maximumQuantity;
    }

    public function getActualDeliveryDate(): ?DateTimeInterface
    {
        return $this->actualDeliveryDate;
    }

    public function setActualDeliveryDate(?DateTimeInterface $actualDeliveryDate): void
    {
        $this->actualDeliveryDate = $actualDeliveryDate;
    }

    public function getActualDeliveryTime(): ?DateTimeInterface
    {
        return $this->actualDeliveryTime;
    }

    public function setActualDeliveryTime(?DateTimeInterface $actualDeliveryTime): void
    {
        $this->actualDeliveryTime = $actualDeliveryTime;
    }

    public function getLatestDeliveryDate(): ?DateTimeInterface
    {
        return $this->latestDeliveryDate;
    }

    public function setLatestDeliveryDate(?DateTimeInterface $latestDeliveryDate): void
    {
        $this->latestDeliveryDate = $latestDeliveryDate;
    }

    public function getLatestDeliveryTime(): ?DateTimeInterface
    {
        return $this->latestDeliveryTime;
    }

    public function setLatestDeliveryTime(?DateTimeInterface $latestDeliveryTime): void
    {
        $this->latestDeliveryTime = $latestDeliveryTime;
    }

    public function getDeliveryAddress(): ?AddressType
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress(?AddressType $deliveryAddress): void
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    public function getDeliveryLocation(): ?LocationType
    {
        return $this->deliveryLocation;
    }

    public function setDeliveryLocation(?LocationType $deliveryLocation): void
    {
        $this->deliveryLocation = $deliveryLocation;
    }

    public function getAlternativeDeliveryLocation(): ?LocationType
    {
        return $this->alternativeDeliveryLocation;
    }

    public function setAlternativeDeliveryLocation(?LocationType $alternativeDeliveryLocation): void
    {
        $this->alternativeDeliveryLocation = $alternativeDeliveryLocation;
    }

    public function getRequestedDeliveryPeriod(): ?PeriodType
    {
        return $this->requestedDeliveryPeriod;
    }

    public function setRequestedDeliveryPeriod(?PeriodType $requestedDeliveryPeriod): void
    {
        $this->requestedDeliveryPeriod = $requestedDeliveryPeriod;
    }

    public function getPromisedDeliveryPeriod(): ?PeriodType
    {
        return $this->promisedDeliveryPeriod;
    }

    public function setPromisedDeliveryPeriod(?PeriodType $promisedDeliveryPeriod): void
    {
        $this->promisedDeliveryPeriod = $promisedDeliveryPeriod;
    }

    public function getEstimatedDeliveryPeriod(): ?PeriodType
    {
        return $this->estimatedDeliveryPeriod;
    }

    public function setEstimatedDeliveryPeriod(?PeriodType $estimatedDeliveryPeriod): void
    {
        $this->estimatedDeliveryPeriod = $estimatedDeliveryPeriod;
    }

    public function getCarrierParty(): ?PartyType
    {
        return $this->carrierParty;
    }

    public function setCarrierParty(?PartyType $carrierParty): void
    {
        $this->carrierParty = $carrierParty;
    }

    public function getDeliveryParty(): ?PartyType
    {
        return $this->deliveryParty;
    }

    public function setDeliveryParty(?PartyType $deliveryParty): void
    {
        $this->deliveryParty = $deliveryParty;
    }

    /**
     * @return PartyType[]
     */
    public function getNotifyParties(): array
    {
        return $this->notifyParties;
    }

    /**
     * @param PartyType[] $notifyParties
     * @return void
     */
    public function setNotifyParties(array $notifyParties): void
    {
        $this->notifyParties = [];
        foreach ($notifyParties as $notifyParty) {
            $this->addNotifyParty($notifyParty);
        }
    }

    public function addNotifyParty(?PartyType $notifyParty = null): PartyType
    {
        return $this->notifyParties []= $notifyParty ?? new PartyType;
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
     * @return DeliveryTermsType[]
     */
    public function getDeliveryTerms(): array
    {
        return $this->deliveryTerms;
    }

    /**
     * @param DeliveryTermsType[] $deliveryTerms
     * @return void
     */
    public function setDeliveryTerms(array $deliveryTerms): void
    {
        $this->deliveryTerms = [];
        foreach ($deliveryTerms as $deliveryTerm) {
            $this->addDeliveryTerms($deliveryTerm);
        }
    }

    public function addDeliveryTerms(?DeliveryTermsType $deliveryTerms = null): DeliveryTermsType
    {
        return $this->deliveryTerms []= $deliveryTerms ?? new DeliveryTermsType;
    }

    public function getMinimumDeliveryUnit(): ?DeliveryUnitType
    {
        return $this->minimumDeliveryUnit;
    }

    public function setMinimumDeliveryUnit(?DeliveryUnitType $minimumDeliveryUnit): void
    {
        $this->minimumDeliveryUnit = $minimumDeliveryUnit;
    }

    public function getMaximumDeliveryUnit(): ?DeliveryUnitType
    {
        return $this->maximumDeliveryUnit;
    }

    public function setMaximumDeliveryUnit(?DeliveryUnitType $maximumDeliveryUnit): void
    {
        $this->maximumDeliveryUnit = $maximumDeliveryUnit;
    }

    public function getShipment(): ?ShipmentType
    {
        return $this->shipment;
    }

    public function setShipment(?ShipmentType $shipment): void
    {
        $this->shipment = $shipment;
    }
}