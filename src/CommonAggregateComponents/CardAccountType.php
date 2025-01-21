<?php


namespace UBL\CommonAggregateComponents;


use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;

class CardAccountType
{
    public function __construct(
        #[SerializedName('PrimaryAccountNumberID')]
        protected ?IdentifierType $primaryAccountNumberID = null,
        #[SerializedName('NetworkID')]
        protected ?IdentifierType $networkID = null,
        #[SerializedName('CardTypeCode')]
        protected ?CodeType $cardTypeCode = null,
        #[SerializedName('ValidityStartDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $validityStartDate = null,
        #[SerializedName('ExpiryDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $expiryDate = null,
        #[SerializedName('IssuerID')]
        protected ?IdentifierType $issuerID = null,
        #[SerializedName('IssueNumberID')]
        protected ?IdentifierType $issueNumberID = null,
        #[SerializedName('CV2ID')]
        protected ?IdentifierType $cV2ID = null,
        #[SerializedName('CardChipCode')]
        protected ?CodeType $cardChipCode = null,
        #[SerializedName('ChipApplicationID')]
        protected ?IdentifierType $chipApplicationID = null,
        #[SerializedName('HolderName')]
        protected ?NameType $holderName = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getPrimaryAccountNumberID(): ?IdentifierType
    {
        return $this->primaryAccountNumberID;
    }

    public function setPrimaryAccountNumberID(?IdentifierType $primaryAccountNumberID): void
    {
        $this->primaryAccountNumberID = $primaryAccountNumberID;
    }

    public function getNetworkID(): ?IdentifierType
    {
        return $this->networkID;
    }

    public function setNetworkID(?IdentifierType $networkID): void
    {
        $this->networkID = $networkID;
    }

    public function getCardTypeCode(): ?CodeType
    {
        return $this->cardTypeCode;
    }

    public function setCardTypeCode(?CodeType $cardTypeCode): void
    {
        $this->cardTypeCode = $cardTypeCode;
    }

    public function getValidityStartDate(): ?DateTimeInterface
    {
        return $this->validityStartDate;
    }

    public function setValidityStartDate(?DateTimeInterface $validityStartDate): void
    {
        $this->validityStartDate = $validityStartDate;
    }

    public function getExpiryDate(): ?DateTimeInterface
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(?DateTimeInterface $expiryDate): void
    {
        $this->expiryDate = $expiryDate;
    }

    public function getIssuerID(): ?IdentifierType
    {
        return $this->issuerID;
    }

    public function setIssuerID(?IdentifierType $issuerID): void
    {
        $this->issuerID = $issuerID;
    }

    public function getIssueNumberID(): ?IdentifierType
    {
        return $this->issueNumberID;
    }

    public function setIssueNumberID(?IdentifierType $issueNumberID): void
    {
        $this->issueNumberID = $issueNumberID;
    }

    public function getCV2ID(): ?IdentifierType
    {
        return $this->cV2ID;
    }

    public function setCV2ID(?IdentifierType $cV2ID): void
    {
        $this->cV2ID = $cV2ID;
    }

    public function getCardChipCode(): ?CodeType
    {
        return $this->cardChipCode;
    }

    public function setCardChipCode(?CodeType $cardChipCode): void
    {
        $this->cardChipCode = $cardChipCode;
    }

    public function getChipApplicationID(): ?IdentifierType
    {
        return $this->chipApplicationID;
    }

    public function setChipApplicationID(?IdentifierType $chipApplicationID): void
    {
        $this->chipApplicationID = $chipApplicationID;
    }

    public function getHolderName(): ?NameType
    {
        return $this->holderName;
    }

    public function setHolderName(?NameType $holderName): void
    {
        $this->holderName = $holderName;
    }
}