<?php


namespace UBL\CommonAggregateComponents;


use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\TextType;

class DocumentReferenceType
{
    /**
     * @param TextType[] $xPaths
     * @param TextType[] $documentDescriptions
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('CopyIndicator')]
        protected ?Indicator $copyIndicator = null,
        #[SerializedName('UUID')]
        protected ?IdentifierType $uuid = null,
        #[SerializedName('IssueDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $issueDate = null,
        #[SerializedName('IssueTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $issueTime = null,
        #[SerializedName('DocumentTypeCode')]
        protected ?CodeType $documentTypeCode = null,
        #[SerializedName('DocumentType')]
        protected ?TextType $documentType = null,
        #[SerializedName('XPath')]
        protected array $xPaths = [],
        #[SerializedName('LanguageID')]
        protected ?IdentifierType $languageID = null,
        #[SerializedName('LocaleCode')]
        protected ?CodeType $localeCode = null,
        #[SerializedName('VersionID')]
        protected ?IdentifierType $versionID = null,
        #[SerializedName('DocumentStatusCode')]
        protected ?CodeType $documentStatusCode = null,
        #[SerializedName('DocumentDescription')]
        protected array $documentDescriptions = [],
        #[SerializedName('Attachment')]
        protected ?AttachmentType $attachment = null,
        #[SerializedName('ValidityPeriod')]
        protected ?PeriodType $validityPeriod = null,
        #[SerializedName('IssuerParty')]
        protected ?PartyType $issuerParty = null,
        #[SerializedName('ResultOfVerification')]
        protected ?ResultOfVerificationType $resultOfVerification = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getCopyIndicator(): ?Indicator
    {
        return $this->copyIndicator;
    }

    public function setCopyIndicator(?Indicator $copyIndicator): void
    {
        $this->copyIndicator = $copyIndicator;
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

    public function setIssueDate(DateTimeInterface $date, $time = false): self
    {
        $this->issueDate = $date;
        if ($time) {
            $this->setIssueTime($date);
        }
        return $this;
    }

    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    public function setIssueTime(DateTimeInterface $date): self
    {
        $this->issueTime = $date;
        return $this;
    }

    public function getDocumentTypeCode(): ?CodeType
    {
        return $this->documentTypeCode;
    }

    public function setDocumentTypeCode(?CodeType $documentTypeCode): void
    {
        $this->documentTypeCode = $documentTypeCode;
    }

    public function getDocumentType(): ?TextType
    {
        return $this->documentType;
    }

    public function setDocumentType(?TextType $documentType): void
    {
        $this->documentType = $documentType;
    }

    /**
     * @return TextType[]
     */
    public function getXPaths(): array
    {
        return $this->xPaths;
    }

    /**
     * @param TextType[] $xPaths
     * @return void
     */
    public function setXPaths(array $xPaths): void
    {
        $this->xPaths = [];
        foreach ($xPaths as $xPath) {
            $this->addXPath($xPath);
        }
    }

    public function addXPath(?TextType $xPath = null): TextType
    {
        return $this->xPaths []= $xPath ?? new TextType;
    }

    public function getLanguageID(): ?IdentifierType
    {
        return $this->languageID;
    }

    public function setLanguageID(?IdentifierType $languageID): void
    {
        $this->languageID = $languageID;
    }

    public function getLocaleCode(): ?CodeType
    {
        return $this->localeCode;
    }

    public function setLocaleCode(?CodeType $localeCode): void
    {
        $this->localeCode = $localeCode;
    }

    public function getVersionID(): ?IdentifierType
    {
        return $this->versionID;
    }

    public function setVersionID(?IdentifierType $versionID): void
    {
        $this->versionID = $versionID;
    }

    public function getDocumentStatusCode(): ?CodeType
    {
        return $this->documentStatusCode;
    }

    public function setDocumentStatusCode(?CodeType $documentStatusCode): void
    {
        $this->documentStatusCode = $documentStatusCode;
    }

    /**
     * @return TextType[]
     */
    public function getDocumentDescriptions(): array
    {
        return $this->documentDescriptions;
    }

    /**
     * @param TextType[] $documentDescriptions
     * @return void
     */
    public function setDocumentDescriptions(array $documentDescriptions): void
    {
        $this->documentDescriptions = [];
        foreach ($documentDescriptions as $documentDescription) {
            $this->addDocumentDescription($documentDescription);
        }
    }
    public function addDocumentDescription(?TextType $documentDescription = null): TextType
    {
        return $this->documentDescriptions []= $documentDescription ?? new TextType;
    }

    public function getAttachment(): ?AttachmentType
    {
        return $this->attachment;
    }

    public function setAttachment(?AttachmentType $attachment): void
    {
        $this->attachment = $attachment;
    }

    public function getValidityPeriod(): ?PeriodType
    {
        return $this->validityPeriod;
    }

    public function setValidityPeriod(?PeriodType $validityPeriod): void
    {
        $this->validityPeriod = $validityPeriod;
    }

    public function getIssuerParty(): ?PartyType
    {
        return $this->issuerParty;
    }

    public function setIssuerParty(?PartyType $issuerParty): void
    {
        $this->issuerParty = $issuerParty;
    }

    public function getResultOfVerification(): ?ResultOfVerificationType
    {
        return $this->resultOfVerification;
    }

    public function setResultOfVerification(?ResultOfVerificationType $resultOfVerification): void
    {
        $this->resultOfVerification = $resultOfVerification;
    }

}