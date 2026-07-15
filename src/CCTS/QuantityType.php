<?php /** @noinspection PhpUnused */


namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;

class QuantityType
{
    public function __construct(
        #[SerializedName('#')]
        public float $value,
        #[SerializedName('@unitCode')]
        public ?string $unitCode = null,
        #[SerializedName('@unitCodeListID')]
        public ?string $unitCodeListID = null,
        #[SerializedName('@unitCodeListAgencyID')]
        public ?string $unitCodeListAgencyID = null,
        #[SerializedName('@unitCodeListAgencyName')]
        public ?string $unitCodeListAgencyName = null
    )
    {
    }
}