<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class ResultOfVerificationType
{
    public function __construct(
        #[SerializedName('ValidatorID')]
        protected ?IdentifierType $validatorID = null,
        #[SerializedName('ValidationResultCode')]
        protected ?CodeType $validationResultCode = null,
        #[SerializedName('ValidationDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $validationDate = null,
        #[SerializedName('ValidationTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $validationTime = null,
        #[SerializedName('ValidateProcess')]
        protected ?TextType $validateProcess = null,
        #[SerializedName('ValidateTool')]
        protected ?TextType $validateTool = null,
        #[SerializedName('ValidateToolVersion')]
        protected ?TextType $validateToolVersion = null,
        #[SerializedName('SignatoryParty')]
        protected ?PartyType $signatoryParty = null
    )
    {
    }

    public function getValidatorID(): ?IdentifierType
    {
        return $this->validatorID;
    }

    public function setValidatorID(?IdentifierType $validatorID): void
    {
        $this->validatorID = $validatorID;
    }

    public function getValidationResultCode(): ?CodeType
    {
        return $this->validationResultCode;
    }

    public function setValidationResultCode(?CodeType $validationResultCode): void
    {
        $this->validationResultCode = $validationResultCode;
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

    public function getValidateProcess(): ?TextType
    {
        return $this->validateProcess;
    }

    public function setValidateProcess(?TextType $validateProcess): void
    {
        $this->validateProcess = $validateProcess;
    }

    public function getValidateTool(): ?TextType
    {
        return $this->validateTool;
    }

    public function setValidateTool(?TextType $validateTool): void
    {
        $this->validateTool = $validateTool;
    }

    public function getValidateToolVersion(): ?TextType
    {
        return $this->validateToolVersion;
    }

    public function setValidateToolVersion(?TextType $validateToolVersion): void
    {
        $this->validateToolVersion = $validateToolVersion;
    }

    public function getSignatoryParty(): ?PartyType
    {
        return $this->signatoryParty;
    }

    public function setSignatoryParty(?PartyType $signatoryParty): void
    {
        $this->signatoryParty = $signatoryParty;
    }
}