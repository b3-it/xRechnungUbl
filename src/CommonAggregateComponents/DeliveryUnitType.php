<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\QuantityType;

class DeliveryUnitType
{
    public function __construct(
        #[SerializedName('BatchQuantity')]
        protected ?QuantityType $batchQuantity = null,
        #[SerializedName('ConsumerUnitQuantity')]
        protected ?QuantityType $consumerUnitQuantity = null,
        #[SerializedName('HazardousRiskIndicator')]
        protected ?Indicator $hazardousRiskIndicator = null,
    )
    {
    }

    public function getBatchQuantity(): ?QuantityType
    {
        return $this->batchQuantity;
    }

    public function setBatchQuantity(?QuantityType $batchQuantity): void
    {
        $this->batchQuantity = $batchQuantity;
    }

    public function getConsumerUnitQuantity(): ?QuantityType
    {
        return $this->consumerUnitQuantity;
    }

    public function setConsumerUnitQuantity(?QuantityType $consumerUnitQuantity): void
    {
        $this->consumerUnitQuantity = $consumerUnitQuantity;
    }

    public function getHazardousRiskIndicator(): ?Indicator
    {
        return $this->hazardousRiskIndicator;
    }

    public function setHazardousRiskIndicator(?Indicator $hazardousRiskIndicator): void
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;
    }
}