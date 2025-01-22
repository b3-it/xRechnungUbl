<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;

class TradeFinancingType
{

    /**
     * @param DocumentReferenceType[] $documentReferences
     * @param ClauseType[] $clauses
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('FinancingInstrumentCode')]
        protected ?CodeType $financingInstrumentCode = null,
        #[SerializedName('ContractDocumentReference')]
        protected ?DocumentReferenceType $contractDocumentReference = null,
        #[SerializedName('DocumentReference')]
        protected array $documentReferences = [],
        #[SerializedName('FinancingParty')]
        protected ?PartyType $financingParty = null,
        #[SerializedName('FinancingFinancialAccount')]
        protected ?FinancialAccountType $financingFinancialAccount = null,
        #[SerializedName('Clause')]
        protected array $clauses = [],
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

    public function getFinancingInstrumentCode(): ?CodeType
    {
        return $this->financingInstrumentCode;
    }

    public function setFinancingInstrumentCode(?CodeType $financingInstrumentCode): void
    {
        $this->financingInstrumentCode = $financingInstrumentCode;
    }

    public function getContractDocumentReference(): ?DocumentReferenceType
    {
        return $this->contractDocumentReference;
    }

    public function setContractDocumentReference(?DocumentReferenceType $contractDocumentReference): void
    {
        $this->contractDocumentReference = $contractDocumentReference;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getDocumentReferences(): array
    {
        return $this->documentReferences;
    }

    /**
     * @param DocumentReferenceType[] $documentReferences
     * @return void
     */
    public function setDocumentReferences(array $documentReferences): void
    {
        $this->documentReferences = [];
        foreach ($documentReferences as $documentReference) {
            $this->addDocumentReference($documentReference);
        }
    }

    public function addDocumentReference(?DocumentReferenceType $documentReference = null): DocumentReferenceType
    {
        return $this->documentReferences []= $documentReference ?? new DocumentReferenceType;
    }

    public function getFinancingParty(): ?PartyType
    {
        return $this->financingParty;
    }

    public function setFinancingParty(?PartyType $financingParty): void
    {
        $this->financingParty = $financingParty;
    }

    public function getFinancingFinancialAccount(): ?FinancialAccountType
    {
        return $this->financingFinancialAccount;
    }

    public function setFinancingFinancialAccount(?FinancialAccountType $financingFinancialAccount): void
    {
        $this->financingFinancialAccount = $financingFinancialAccount;
    }

    /**
     * @return ClauseType[]
     */
    public function getClauses(): array
    {
        return $this->clauses;
    }

    /**
     * @param ClauseType[] $clauses
     * @return void
     */
    public function setClauses(array $clauses): void
    {
        $this->clauses = $clauses;
    }
}