<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\PercentType;
use UBL\UnqualifiedDataTypes\TextType;

class WorkPhaseReferenceType
{
    /**
     * @param TextType[] $workPhases
     * @param DocumentReferenceType[] $workOrderDocumentReferences
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('WorkPhaseCode')]
        protected ?CodeType $workPhaseCode = null,
        #[SerializedName('WorkPhase')]
        protected array $workPhases = [],
        #[SerializedName('ProgressPercent')]
        protected ?PercentType $progressPercent = null,
        #[SerializedName('StartDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $startDate = null,
        #[SerializedName('EndDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $endDate = null,
        #[SerializedName('WorkOrderDocumentReference')]
        protected array $workOrderDocumentReferences = []
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

    public function getWorkPhaseCode(): ?CodeType
    {
        return $this->workPhaseCode;
    }

    public function setWorkPhaseCode(?CodeType $workPhaseCode): void
    {
        $this->workPhaseCode = $workPhaseCode;
    }

    /**
     * @return TextType[]
     */
    public function getWorkPhases(): array
    {
        return $this->workPhases;
    }

    /**
     * @param TextType[] $workPhases
     * @return void
     */
    public function setWorkPhases(array $workPhases): void
    {
        $this->workPhases = [];
        foreach ($workPhases as $workPhase) {
            $this->addWorkPhase($workPhase);
        }
    }

    public function addWorkPhase(?TextType $workPhase = null): TextType
    {
        return $this->workPhases []= $workPhase ?? new TextType;
    }

    public function getProgressPercent(): ?PercentType
    {
        return $this->progressPercent;
    }

    public function setProgressPercent(?PercentType $progressPercent): void
    {
        $this->progressPercent = $progressPercent;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTimeInterface $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getWorkOrderDocumentReferences(): array
    {
        return $this->workOrderDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $workOrderDocumentReferences
     * @return void
     */
    public function setWorkOrderDocumentReferences(array $workOrderDocumentReferences): void
    {
        $this->workOrderDocumentReferences = [];
        foreach ($workOrderDocumentReferences as $documentReference) {
            $this->addWorkOrderDocumentReference($documentReference);
        }
    }

    public function addWorkOrderDocumentReference(?DocumentReferenceType $workOrderDocumentReference = null): DocumentReferenceType
    {
        return $this->workOrderDocumentReferences []= $workOrderDocumentReference ?? new DocumentReferenceType;
    }
}