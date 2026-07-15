<?php


namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;

class CodeType
{
    public function __construct(
        #[SerializedName('#')]
        public string $value,
        #[SerializedName('@listID')]
        public ?string $listID = null,
        #[SerializedName('@listAgencyID')]
        public ?string $listAgencyID = null,
        #[SerializedName('@listAgencyName')]
        public ?string $listAgencyName = null,
        #[SerializedName('@listName')]
        public ?string $listName = null,
        #[SerializedName('@listVersionID')]
        public ?string $listVersionID = null,
        #[SerializedName('@name')]
        public ?string $name = null,
        #[SerializedName('@languageID')]
        public ?string $languageID = null,
        #[SerializedName('@listURI')]
        public ?string $listURI = null,
        #[SerializedName('@listSchemeURI')]
        public ?string $listSchemeURI = null
    )
    {}
}