<?php

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\IdentifierType;

class PickupType
{

    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('ActualPickupDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $actualPickupDate = null,
        #[SerializedName('ActualPickupTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $actualPickupTime = null,
        #[SerializedName('EarliestPickupDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $earliestPickupDate = null,
        #[SerializedName('EarliestPickupTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $earliestPickupTime = null,
        #[SerializedName('LatestPickupDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $latestPickupDate = null,
        #[SerializedName('LatestPickupTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $latestPickupTime = null,
        #[SerializedName('PickupLocation')]
        protected ?LocationType $pickupLocation = null,
        #[SerializedName('PickupParty')]
        protected ?PartyType $pickupParty = null
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

    public function getActualPickupDate(): ?DateTimeInterface
    {
        return $this->actualPickupDate;
    }

    public function setActualPickupDate(?DateTimeInterface $actualPickupDate): void
    {
        $this->actualPickupDate = $actualPickupDate;
    }

    public function getActualPickupTime(): ?DateTimeInterface
    {
        return $this->actualPickupTime;
    }

    public function setActualPickupTime(?DateTimeInterface $actualPickupTime): void
    {
        $this->actualPickupTime = $actualPickupTime;
    }

    public function getEarliestPickupDate(): ?DateTimeInterface
    {
        return $this->earliestPickupDate;
    }

    public function setEarliestPickupDate(?DateTimeInterface $earliestPickupDate): void
    {
        $this->earliestPickupDate = $earliestPickupDate;
    }

    public function getEarliestPickupTime(): ?DateTimeInterface
    {
        return $this->earliestPickupTime;
    }

    public function setEarliestPickupTime(?DateTimeInterface $earliestPickupTime): void
    {
        $this->earliestPickupTime = $earliestPickupTime;
    }

    public function getLatestPickupDate(): ?DateTimeInterface
    {
        return $this->latestPickupDate;
    }

    public function setLatestPickupDate(?DateTimeInterface $latestPickupDate): void
    {
        $this->latestPickupDate = $latestPickupDate;
    }

    public function getLatestPickupTime(): ?DateTimeInterface
    {
        return $this->latestPickupTime;
    }

    public function setLatestPickupTime(?DateTimeInterface $latestPickupTime): void
    {
        $this->latestPickupTime = $latestPickupTime;
    }

    public function getPickupLocation(): ?LocationType
    {
        return $this->pickupLocation;
    }

    public function setPickupLocation(?LocationType $pickupLocation): void
    {
        $this->pickupLocation = $pickupLocation;
    }

    public function getPickupParty(): ?PartyType
    {
        return $this->pickupParty;
    }

    public function setPickupParty(?PartyType $pickupParty): void
    {
        $this->pickupParty = $pickupParty;
    }
}