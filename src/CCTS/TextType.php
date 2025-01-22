<?php


namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;

class TextType
{

    /**
     * TextType constructor.
     */
    public function __construct(
        #[SerializedName('#')]
        public ?string $value = null,
        #[SerializedName('@languageID')]
        public ?string $languageID = null,
        #[SerializedName('@languageLocaleID')]
        public ?string $languageLocaleID = null
    )
    {}

}