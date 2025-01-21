<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\TextType;

class EnvironmentalEmissionType
{

    /**
     * @param TextType[] $descriptions
     * @param EmissionCalculationMethodType[] $emissionCalculationMethods
     */
    public function __construct(
        #[SerializedName('EnvironmentalEmissionTypeCode')]
        protected ?CodeType $EnvironmentalEmissionTypeCode = null,
        #[SerializedName('ValueMeasure')]
        protected ?MeasureType $valueMeasure = null,
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('EmissionCalculationMethod')]
        protected array $emissionCalculationMethods = []
    )
    {
    }

    public function getEnvironmentalEmissionTypeCode(): ?CodeType
    {
        return $this->EnvironmentalEmissionTypeCode;
    }

    public function setEnvironmentalEmissionTypeCode(?CodeType $EnvironmentalEmissionTypeCode): void
    {
        $this->EnvironmentalEmissionTypeCode = $EnvironmentalEmissionTypeCode;
    }

    public function getValueMeasure(): ?MeasureType
    {
        return $this->valueMeasure;
    }

    public function setValueMeasure(?MeasureType $valueMeasure): void
    {
        $this->valueMeasure = $valueMeasure;
    }

    /**
     * @return TextType[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param TextType[] $descriptions
     * @return void
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = $descriptions;
    }

    /**
     * @return EmissionCalculationMethodType[]
     */
    public function getEmissionCalculationMethods(): array
    {
        return $this->emissionCalculationMethods;
    }

    /**
     * @param EmissionCalculationMethodType[] $emissionCalculationMethods
     * @return void
     */
    public function setEmissionCalculationMethods(array $emissionCalculationMethods): void
    {
        $this->emissionCalculationMethods = $emissionCalculationMethods;
    }
}