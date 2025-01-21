<?php


namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;

class NumericType
{
    public function __construct(
        #[SerializedName('#')]
        public float $value,
        #[SerializedName('@format')]
        public ?string $format = null
    )
    {}
}