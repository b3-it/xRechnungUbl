<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class SignatureType
{
    /**
     * @param TextType[] $notes
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Note')]
        protected array $notes = [],
        #[SerializedName('ValidationDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $validationDate = null,
        #[SerializedName('ValidationTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $validationTime = null,
        #[SerializedName('ValidatorID')]
        protected ?IdentifierType $validatorID = null,
        #[SerializedName('CanonicalizationMethod')]
        protected ?TextType $canonicalizationMethod = null,
        #[SerializedName('SignatureMethod')]
        protected ?TextType $signatureMethod = null,
        #[SerializedName('SignatoryParty')]
        protected ?PartyType $signatoryParty = null,
        #[SerializedName('DigitalSignatureAttachment')]
        protected ?AttachmentType $digitalSignatureAttachment = null,
        #[SerializedName('OriginalDocumentReference')]
        protected ?DocumentReferenceType $originalDocumentReference = null
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

    /**
     * @return TextType[]
     */
    public function getNotes(): array
    {
        return $this->notes;
    }

    /**
     * @param TextType[] $notes
     * @return void
     */
    public function setNotes(array $notes): void
    {
        $this->notes = [];
        foreach ($notes as $note) {
            $this->addNote($note);
        }
    }

    public function addNote(TextType $note): void
    {
        $this->notes []= $note;
    }

    public function getValidationDate(): ?DateTimeInterface
    {
        return $this->validationDate;
    }

    public function setValidationDate(?DateTimeInterface $validationDate, bool $time = false): void
    {
        $this->validationDate = $validationDate;
        if ($time) {
            $this->setValidationTime($validationDate);
        }
    }

    public function getValidationTime(): ?DateTimeInterface
    {
        return $this->validationTime;
    }

    public function setValidationTime(?DateTimeInterface $validationTime): void
    {
        $this->validationTime = $validationTime;
    }

    public function getValidatorID(): ?IdentifierType
    {
        return $this->validatorID;
    }

    public function setValidatorID(?IdentifierType $validatorID): void
    {
        $this->validatorID = $validatorID;
    }

    public function getCanonicalizationMethod(): ?TextType
    {
        return $this->canonicalizationMethod;
    }

    public function setCanonicalizationMethod(?TextType $canonicalizationMethod): void
    {
        $this->canonicalizationMethod = $canonicalizationMethod;
    }

    public function getSignatureMethod(): ?TextType
    {
        return $this->signatureMethod;
    }

    public function setSignatureMethod(?TextType $signatureMethod): void
    {
        $this->signatureMethod = $signatureMethod;
    }

    public function getSignatoryParty(): ?PartyType
    {
        return $this->signatoryParty;
    }

    public function setSignatoryParty(?PartyType $signatoryParty): void
    {
        $this->signatoryParty = $signatoryParty;
    }

    public function getDigitalSignatureAttachment(): ?AttachmentType
    {
        return $this->digitalSignatureAttachment;
    }

    public function setDigitalSignatureAttachment(?AttachmentType $digitalSignatureAttachment): void
    {
        $this->digitalSignatureAttachment = $digitalSignatureAttachment;
    }

    public function getOriginalDocumentReference(): ?DocumentReferenceType
    {
        return $this->originalDocumentReference;
    }

    public function setOriginalDocumentReference(?DocumentReferenceType $originalDocumentReference): void
    {
        $this->originalDocumentReference = $originalDocumentReference;
    }


}