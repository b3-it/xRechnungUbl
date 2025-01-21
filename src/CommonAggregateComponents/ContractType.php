<?php

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class ContractType
{
    /**
     * @param TextType[] $notes
     * @param TextType[] $descriptions
     * @param DocumentReferenceType[] $contractDocumentReferences
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('IssueDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $issueDate = null,
        #[SerializedName('IssueTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $issueTime = null,
        #[SerializedName('NominationDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $nominationDate = null,
        #[SerializedName('NominationTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $nominationTime = null,
        #[SerializedName('ContractTypeCode')]
        protected ?CodeType $contractTypeCode = null,
        #[SerializedName('ContractType')]
        protected ?TextType $contractType = null,
        #[SerializedName('Note')]
        protected array $notes = [],
        #[SerializedName('VersionID')]
        protected ?IdentifierType $versionID = null,
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('ValidityPeriod')]
        protected ?PeriodType $validityPeriod = null,
        #[SerializedName('ContractDocumentReference')]
        protected array $contractDocumentReferences = [],
        #[SerializedName('NominationPeriod')]
        protected ?PeriodType $nominationPeriod = null,
        #[SerializedName('ContractualDelivery')]
        protected ?DeliveryType $contractualDelivery = null
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

    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(?DateTimeInterface $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    public function setIssueTime(?DateTimeInterface $issueTime): void
    {
        $this->issueTime = $issueTime;
    }

    public function getNominationDate(): ?DateTimeInterface
    {
        return $this->nominationDate;
    }

    public function setNominationDate(?DateTimeInterface $nominationDate): void
    {
        $this->nominationDate = $nominationDate;
    }

    public function getNominationTime(): ?DateTimeInterface
    {
        return $this->nominationTime;
    }

    public function setNominationTime(?DateTimeInterface $nominationTime): void
    {
        $this->nominationTime = $nominationTime;
    }

    public function getContractTypeCode(): ?CodeType
    {
        return $this->contractTypeCode;
    }

    public function setContractTypeCode(?CodeType $contractTypeCode): void
    {
        $this->contractTypeCode = $contractTypeCode;
    }

    public function getContractType(): ?TextType
    {
        return $this->contractType;
    }

    public function setContractType(?TextType $contractType): void
    {
        $this->contractType = $contractType;
    }

    public function getNotes(): array
    {
        return $this->notes;
    }

    public function setNotes(array $notes): void
    {
        $this->notes = $notes;
    }

    public function getVersionID(): ?IdentifierType
    {
        return $this->versionID;
    }

    public function setVersionID(?IdentifierType $versionID): void
    {
        $this->versionID = $versionID;
    }

    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = $descriptions;
    }

    public function getValidityPeriod(): ?PeriodType
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?PeriodType $validityPeriod): void
    {
        $this->validityPeriod = $validityPeriod;
    }

    public function getContractDocumentReferences(): array
    {
        return $this->contractDocumentReferences;
    }

    public function setContractDocumentReferences(array $contractDocumentReferences): void
    {
        $this->contractDocumentReferences = $contractDocumentReferences;
    }

    public function getNominationPeriod(): ?PeriodType
    {
        return $this->nominationPeriod;
    }

    public function setNominationPeriod(?PeriodType $nominationPeriod): void
    {
        $this->nominationPeriod = $nominationPeriod;
    }

    public function getContractualDelivery(): ?DeliveryType
    {
        return $this->contractualDelivery;
    }

    public function setContractualDelivery(?DeliveryType $contractualDelivery): void
    {
        $this->contractualDelivery = $contractualDelivery;
    }
}