<?php

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\IdentifierType;

class PaymentType
{
    public function __construct(

        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('PaidAmount')]
        protected ?AmountType $paidAmount = null,
        #[SerializedName('ReceivedDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $receivedDate = null,
        #[SerializedName('PaidDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $paidDate = null,
        #[SerializedName('PaidTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $paidTime = null,
        #[SerializedName('InstructionID')]
        protected ?IdentifierType $instructionID = null,
    )
    {
    }

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getPaidAmount(): ?AmountType
    {
        return $this->paidAmount;
    }

    public function setPaidAmount(?AmountType $paidAmount): void
    {
        $this->paidAmount = $paidAmount;
    }

    public function getReceivedDate(): ?DateTimeInterface
    {
        return $this->receivedDate;
    }

    public function setReceivedDate(?DateTimeInterface $receivedDate): void
    {
        $this->receivedDate = $receivedDate;
    }

    public function getPaidDate(): ?DateTimeInterface
    {
        return $this->paidDate;
    }

    public function setPaidDate(?DateTimeInterface $paidDate): void
    {
        $this->paidDate = $paidDate;
    }

    public function getPaidTime(): ?DateTimeInterface
    {
        return $this->paidTime;
    }

    public function setPaidTime(?DateTimeInterface $paidTime): void
    {
        $this->paidTime = $paidTime;
    }

    public function getInstructionID(): ?IdentifierType
    {
        return $this->instructionID;
    }

    public function setInstructionID(?IdentifierType $instructionID): void
    {
        $this->instructionID = $instructionID;
    }
}