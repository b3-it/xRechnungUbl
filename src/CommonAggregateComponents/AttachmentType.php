<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\BinaryObjectType;

class AttachmentType
{
    public function __construct(
        #[SerializedName('EmbeddedDocumentBinaryObject')]
        protected ?BinaryObjectType $embeddedDocumentBinaryObject = null,
        #[SerializedName('ExternalReference')]
        protected ?ExternalReferenceType $externalReference = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getEmbeddedDocumentBinaryObject(): ?BinaryObjectType
    {
        return $this->embeddedDocumentBinaryObject;
    }

    public function setEmbeddedDocumentBinaryObject(?BinaryObjectType $embeddedDocumentBinaryObject): void
    {
        $this->embeddedDocumentBinaryObject = $embeddedDocumentBinaryObject;
    }

    public function getExternalReference(): ?ExternalReferenceType
    {
        return $this->externalReference;
    }

    public function setExternalReference(?ExternalReferenceType $externalReference): void
    {
        $this->externalReference = $externalReference;
    }
}