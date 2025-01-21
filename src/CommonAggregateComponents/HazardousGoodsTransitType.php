<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;

class HazardousGoodsTransitType
{
    public function __construct(
        #[SerializedName('TransportEmergencyCardCode')]
        protected ?CodeType $transportEmergencyCardCode = null,
        #[SerializedName('PackingCriteriaCode')]
        protected ?CodeType $packingCriteriaCode = null,
        #[SerializedName('HazardousRegulationCode')]
        protected ?CodeType $hazardousRegulationCode = null,
        #[SerializedName('InhalationToxicityZoneCode')]
        protected ?CodeType $inhalationToxicityZoneCode = null,
        #[SerializedName('TransportAuthorizationCode')]
        protected ?CodeType $transportAuthorizationCode = null,
        #[SerializedName('MaximumTemperature')]
        protected ?TemperatureType $maximumTemperature = null,
        #[SerializedName('MinimumTemperature')]
        protected ?TemperatureType $minimumTemperature = null,
    )
    {
    }

    public function getTransportEmergencyCardCode(): ?CodeType
    {
        return $this->transportEmergencyCardCode;
    }

    public function setTransportEmergencyCardCode(?CodeType $transportEmergencyCardCode): void
    {
        $this->transportEmergencyCardCode = $transportEmergencyCardCode;
    }

    public function getPackingCriteriaCode(): ?CodeType
    {
        return $this->packingCriteriaCode;
    }

    public function setPackingCriteriaCode(?CodeType $packingCriteriaCode): void
    {
        $this->packingCriteriaCode = $packingCriteriaCode;
    }

    public function getHazardousRegulationCode(): ?CodeType
    {
        return $this->hazardousRegulationCode;
    }

    public function setHazardousRegulationCode(?CodeType $hazardousRegulationCode): void
    {
        $this->hazardousRegulationCode = $hazardousRegulationCode;
    }

    public function getInhalationToxicityZoneCode(): ?CodeType
    {
        return $this->inhalationToxicityZoneCode;
    }

    public function setInhalationToxicityZoneCode(?CodeType $inhalationToxicityZoneCode): void
    {
        $this->inhalationToxicityZoneCode = $inhalationToxicityZoneCode;
    }

    public function getTransportAuthorizationCode(): ?CodeType
    {
        return $this->transportAuthorizationCode;
    }

    public function setTransportAuthorizationCode(?CodeType $transportAuthorizationCode): void
    {
        $this->transportAuthorizationCode = $transportAuthorizationCode;
    }

    public function getMaximumTemperature(): ?TemperatureType
    {
        return $this->maximumTemperature;
    }

    public function setMaximumTemperature(?TemperatureType $maximumTemperature): void
    {
        $this->maximumTemperature = $maximumTemperature;
    }

    public function getMinimumTemperature(): ?TemperatureType
    {
        return $this->minimumTemperature;
    }

    public function setMinimumTemperature(?TemperatureType $minimumTemperature): void
    {
        $this->minimumTemperature = $minimumTemperature;
    }
}