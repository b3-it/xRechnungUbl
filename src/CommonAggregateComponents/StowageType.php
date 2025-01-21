<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class StowageType
{
    /**
     * @param IdentifierType|null $locationId
     * @param TextType[] $locations
     * @param DimensionType[] $MeasurementDimensions
     */
    public function __construct(
        #[SerializedName('LocationID')]
        protected ?IdentifierType $locationID = null,
        #[SerializedName('Location')]
        protected array $locations = [],
        #[SerializedName('MeasurementDimension')]
        protected array $MeasurementDimensions = []
    )
    {
    }

    public function getLocationID(): ?IdentifierType
    {
        return $this->locationID;
    }

    public function setLocationID(?IdentifierType $locationID): void
    {
        $this->locationID = $locationID;
    }

    /**
     * @return TextType[]
     */
    public function getLocations(): array
    {
        return $this->locations;
    }

    /**
     * @param TextType[] $locations
     * @return void
     */
    public function setLocations(array $locations): void
    {
        $this->locations = $locations;
    }

    /**
     * @return DimensionType[]
     */
    public function getMeasurementDimensions(): array
    {
        return $this->MeasurementDimensions;
    }

    /**
     * @param DimensionType[] $MeasurementDimensions
     * @return void
     */
    public function setMeasurementDimensions(array $MeasurementDimensions): void
    {
        $this->MeasurementDimensions = $MeasurementDimensions;
    }


}