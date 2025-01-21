<?php

namespace UBL\Serializer;

use ArrayObject;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * @template TValue
 * @template-implements ArrayObject<int, TValue>
 * @deprecated
 */
class EmptyArray extends ArrayObject implements NormalizableInterface
{

    /**
     * @inheritDoc
     * @throws ExceptionInterface
     */
    public function normalize(NormalizerInterface $normalizer, ?string $format = null, array $context = []): array|string|int|float|bool|ArrayObject|null
    {
        return $this->count() ? $normalizer->normalize($this->getArrayCopy(), $format, $context) : null;
    }
}