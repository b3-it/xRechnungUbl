<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\MeasureType;

class LocationCoordinateType
{


    public function __construct(
        #[SerializedName('CoordinateSystemCode')]
        public ?CodeType $coordinateSystemCode = null,
        #[SerializedName('LatitudeDegreesMeasure')]
        public ?MeasureType $latitudeDegreesMeasure = null,
        #[SerializedName('LatitudeMinutesMeasure')]
        public ?MeasureType $latitudeMinutesMeasure = null,
        #[SerializedName('LatitudeDirectionCode')]
        public ?CodeType $latitudeDirectionCode = null,
        #[SerializedName('LongitudeDegreesMeasure')]
        public ?MeasureType $longitudeDegreesMeasure = null,
        #[SerializedName('LongitudeMinutesMeasure')]
        public ?MeasureType $longitudeMinutesMeasure = null,
        #[SerializedName('LongitudeDirectionCode')]
        public ?CodeType $longitudeDirectionCode = null,
        #[SerializedName('AltitudeMeasure')]
        public ?MeasureType $altitudeMeasure = null
    )
    {
    }
}