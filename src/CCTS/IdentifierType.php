<?php

namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;

class IdentifierType
{
    /**
     * IdentifierType constructor.
     */
    public function __construct(
        #[SerializedName('#')]
        public string $value = '',
        #[SerializedName('@schemeID')]
        public ?string $schemeID = null,
        #[SerializedName('@schemeName')]
        public ?string $schemeName = null,
        #[SerializedName('@schemeAgencyID')]
        public ?string $schemeAgencyID = null,
        #[SerializedName('@schemeAgencyName')]
        public ?string $schemeAgencyName = null,
        #[SerializedName('@schemeVersionID')]
        public ?string $schemeVersionID = null,
        #[SerializedName('@schemeDataURI')]
        public ?string $schemeDataURI = null,
        #[SerializedName('@schemeURI')]
        public ?string $schemeURI = null,
)
    {
        #$this->setPrefix(CCTS::PREFIX);
    }
}