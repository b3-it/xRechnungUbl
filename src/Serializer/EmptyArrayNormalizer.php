<?php

namespace UBL\Serializer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EmptyArrayNormalizer implements NormalizerInterface
{

    /**
     * @inheritDoc
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array|null
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_array($data) && empty($data);
    }

    public function getSupportedTypes(?string $format): array
    {
        return ['object' => null, '*' => false];
    }
}