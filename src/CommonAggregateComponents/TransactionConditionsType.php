<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class TransactionConditionsType
{
    /**
     * @param TextType[] $descriptions
     * @param DocumentReferenceType[] $documentReferences
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('ActionCode')]
        protected ?CodeType $actionCode = null,
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('DocumentReference')]
        protected array $documentReferences = [],
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

    public function getActionCode(): ?CodeType
    {
        return $this->actionCode;
    }

    public function setActionCode(?CodeType $actionCode): void
    {
        $this->actionCode = $actionCode;
    }

    /**
     * @return TextType[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param TextType[] $descriptions
     * @return void
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = [];
        foreach ($descriptions as $description) {
            $this->addDescription($description);
        }
    }

    public function addDescription(?TextType $description = null): TextType
    {
        return $this->descriptions []= $description ?? new TextType;
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
}