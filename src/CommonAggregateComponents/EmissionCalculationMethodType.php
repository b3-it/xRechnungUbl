<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;

class EmissionCalculationMethodType
{
    public function __construct(
        #[SerializedName('CalculationMethodCode')]
        protected ?CodeType $calculationMethodCode = null,
        #[SerializedName('FullnessIndicationCode')]
        protected ?CodeType $fullnessIndicationCode = null,
        #[SerializedName('MeasurementFromLocation')]
        protected ?LocationType $measurementFromLocation = null,
        #[SerializedName('MeasurementToLocation')]
        protected ?LocationType $measurementToLocation = null,
    )
    {
    }

    public function getCalculationMethodCode(): ?CodeType
    {
        return $this->calculationMethodCode;
    }

    public function setCalculationMethodCode(?CodeType $calculationMethodCode): void
    {
        $this->calculationMethodCode = $calculationMethodCode;
    }

    public function getFullnessIndicationCode(): ?CodeType
    {
        return $this->fullnessIndicationCode;
    }

    public function setFullnessIndicationCode(?CodeType $fullnessIndicationCode): void
    {
        $this->fullnessIndicationCode = $fullnessIndicationCode;
    }

    public function getMeasurementFromLocation(): ?LocationType
    {
        return $this->measurementFromLocation;
    }

    public function setMeasurementFromLocation(?LocationType $measurementFromLocation): void
    {
        $this->measurementFromLocation = $measurementFromLocation;
    }

    public function getMeasurementToLocation(): ?LocationType
    {
        return $this->measurementToLocation;
    }

    public function setMeasurementToLocation(?LocationType $measurementToLocation): void
    {
        $this->measurementToLocation = $measurementToLocation;
    }
}