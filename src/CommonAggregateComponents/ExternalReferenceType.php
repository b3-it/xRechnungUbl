<?php


namespace UBL\CommonAggregateComponents;


use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\IdentifierType;

class ExternalReferenceType
{

    public function __construct(
        #[SerializedName('URI')]
        protected ?IdentifierType $uri = null,
        #[SerializedName('ExpiryDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $expiryDate = null,

        #[SerializedName('ExpiryTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $expiryTime = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getUri(): ?IdentifierType
    {
        return $this->uri;
    }

    public function setUri(?IdentifierType $uri): void
    {
        $this->uri = $uri;
    }

    public function getExpiryDate(): ?DateTimeInterface
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(DateTimeInterface $date, $time = false): static
    {
        $this->expiryDate = $date;
        if ($time) {
            $this->setExpiryTime($date);
        }
        return $this;
    }

    public function getExpiryTime(): ?DateTimeInterface
    {
        return $this->expiryTime;
    }

    public function setExpiryTime(DateTimeInterface $date): static
    {
        $this->expiryTime = $date;
        return $this;
    }
}