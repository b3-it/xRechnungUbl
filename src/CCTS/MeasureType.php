<?php


namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;

class MeasureType
{

    public function __construct(
        #[SerializedName('#')]
        public float $value,
        #[SerializedName('@unitCode')]
        public ?string $unitCode = null,
        #[SerializedName('@unitCodeListVersionID')]
        public ?string $unitCodeListVersionID = null
    )
    {}
}