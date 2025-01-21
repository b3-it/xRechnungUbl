<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class PowerOfAttorneyType
{
    /**
     * @param TextType[] $descriptions
     * @param PartyType[] $witnessParty
     * @param DocumentReferenceType[] $mandateDocumentReferences
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
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('NotaryParty')]
        protected ?PartyType $notaryParty = null,
        #[SerializedName('AgentParty')]
        protected ?PartyType $agentParty = null,
        #[SerializedName('WitnessParty')]
        protected array $witnessParty = [],
        #[SerializedName('MandateDocumentReference')]
        protected array $mandateDocumentReferences = []
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

    public function setIssueDate(?DateTimeInterface $issueDate, bool $time = false): void
    {
        $this->issueDate = $issueDate;
        if ($time) {
            $this->setIssueTime($issueDate);
        }
    }

    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    public function setIssueTime(?DateTimeInterface $issueTime): void
    {
        $this->issueTime = $issueTime;
    }

    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = $descriptions;
    }

    public function getNotaryParty(): ?PartyType
    {
        return $this->notaryParty;
    }

    public function setNotaryParty(?PartyType $notaryParty): void
    {
        $this->notaryParty = $notaryParty;
    }

    public function getAgentParty(): ?PartyType
    {
        return $this->agentParty;
    }

    public function setAgentParty(?PartyType $agentParty): void
    {
        $this->agentParty = $agentParty;
    }

    public function getWitnessParty(): array
    {
        return $this->witnessParty;
    }

    public function setWitnessParty(array $witnessParty): void
    {
        $this->witnessParty = $witnessParty;
    }

    public function getMandateDocumentReferences(): array
    {
        return $this->mandateDocumentReferences;
    }

    public function setMandateDocumentReferences(array $mandateDocumentReferences): void
    {
        $this->mandateDocumentReferences = $mandateDocumentReferences;
    }


}