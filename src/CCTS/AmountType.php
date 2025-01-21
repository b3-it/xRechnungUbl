<?php


namespace UBL\CCTS;


use JsonSerializable;
use Symfony\Component\Serializer\Attribute\SerializedName;

class AmountType implements JsonSerializable
{

    public function __construct(
        #[SerializedName('#')]
        public float $value,
        #[SerializedName('@currencyID')]
        public ?string $currencyID = null,
        #[SerializedName('@currencyCodeListVersionID')]
        public ?string $currencyCodeListVersionID = null
    )
    {}

    public function jsonSerialize(): array
    {
        return array_filter([
            '#' => sprintf('%.2F', $this->value),
            '@currencyID' => $this->currencyID,
            '@currencyCodeListVersionID' => $this->currencyCodeListVersionID
        ]);
    }
}