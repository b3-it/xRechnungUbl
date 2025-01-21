<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\IdentifierType;

class ProjectReferenceType
{
    /**
     * @param WorkPhaseReferenceType[] $workPhaseReferences
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('UUID')]
        protected ?IdentifierType $uuid = null,
        #[SerializedName('IssueDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $issueDate = null,
        #[SerializedName('WorkPhaseReference')]
        protected array $workPhaseReferences = []
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

    public function getUuid(): ?IdentifierType
    {
        return $this->uuid;
    }

    public function setUuid(?IdentifierType $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(?DateTimeInterface $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    /**
     * @return WorkPhaseReferenceType[]
     */
    public function getWorkPhaseReferences(): array
    {
        return $this->workPhaseReferences;
    }

    /**
     * @param WorkPhaseReferenceType[] $workPhaseReferences
     * @return void
     */
    public function setWorkPhaseReferences(array $workPhaseReferences): void
    {
        $this->workPhaseReferences = [];
        foreach ($workPhaseReferences as $workPhaseReference) {
            $this->addWorkPhaseReference($workPhaseReference);
        }
    }

    public function addWorkPhaseReference(WorkPhaseReferenceType $workPhaseReference): void
    {
        $this->workPhaseReferences []= $workPhaseReference;
    }


}