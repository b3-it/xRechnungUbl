<?php


namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;

class BinaryObjectType
{
    public function __construct(
        #[SerializedName('#')]
        public string $value,
        #[SerializedName('@mimeCode')]
        public ?string $mimeCode = null,
        #[SerializedName('@format')]
        public ?string $format = null,
        #[SerializedName('@encodingCode')]
        public ?string $encodingCode = null,
        #[SerializedName('@characterSetCode')]
        public ?string $characterSetCode = null,
        #[SerializedName('@uri')]
        public ?string $uri = null,
        #[SerializedName('@filename')]
        public ?string $filename = null
    )
    {
    }
}