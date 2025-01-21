<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;

class LineReferenceType
{
    public function __construct(
        #[SerializedName('LineID')]
        protected ?IdentifierType $lineID = null,
        #[SerializedName('UUID')]
        protected ?IdentifierType $uuid = null,
        #[SerializedName('LineStatusCode')]
        protected ?CodeType $lineStatusCode = null,
        #[SerializedName('DocumentReference')]
        protected ?DocumentReferenceType $documentReference = null,
    )
    {
    }

    public function getLineID(): ?IdentifierType
    {
        return $this->lineID;
    }

    public function setLineID(?IdentifierType $lineID): void
    {
        $this->lineID = $lineID;
    }

    public function getUuid(): ?IdentifierType
    {
        return $this->uuid;
    }

    public function setUuid(?IdentifierType $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getLineStatusCode(): ?CodeType
    {
        return $this->lineStatusCode;
    }

    public function setLineStatusCode(?CodeType $lineStatusCode): void
    {
        $this->lineStatusCode = $lineStatusCode;
    }

    public function getDocumentReference(): ?DocumentReferenceType
    {
        return $this->documentReference;
    }

    public function setDocumentReference(?DocumentReferenceType $documentReference): void
    {
        $this->documentReference = $documentReference;
    }
}