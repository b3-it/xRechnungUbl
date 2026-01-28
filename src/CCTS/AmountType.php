<?php


namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AmountType implements NormalizableInterface
{

    public function __construct(
        #[SerializedName('#')]
        public float $value,
        #[Assert\Currency(message: 'BR-CL-03')]
        #[SerializedName('@currencyID')]
        public ?string $currencyID = null,
        #[SerializedName('@currencyCodeListVersionID')]
        public ?string $currencyCodeListVersionID = null
    )
    {}

    public function normalize(NormalizerInterface $normalizer, ?string $format = null, array $context = []): array
    {
        return array_filter([
            '#' => sprintf('%.2F', $this->value),
            '@currencyID' => $this->currencyID,
            '@currencyCodeListVersionID' => $this->currencyCodeListVersionID
        ]);
    }
}