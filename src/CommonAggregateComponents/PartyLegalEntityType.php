<?php


namespace UBL\CommonAggregateComponents;


use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\TextType;

class PartyLegalEntityType
{
    /**
     * @param PartyType[] $shareholderParties
     */
    public function __construct(
        #[SerializedName('RegistrationName')]
        protected ?NameType $registrationName = null,
        #[SerializedName('CompanyID')]
        protected ?IdentifierType $companyID = null,
        #[SerializedName('RegistrationDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $registrationDate = null,
        #[SerializedName('RegistrationExpirationDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $registrationExpirationDate = null,
        #[SerializedName('CompanyLegalFormCode')]
        protected ?CodeType $companyLegalFormCode = null,
        #[SerializedName('CompanyLegalForm')]
        protected ?TextType $companyLegalForm = null,
        #[SerializedName('SoleProprietorshipIndicator')]
        protected ?Indicator $soleProprietorshipIndicator = null,
        #[SerializedName('CompanyLiquidationStatusCode')]
        protected ?CodeType $companyLiquidationStatusCode = null,
        #[SerializedName('CorporateStockAmount')]
        protected ?AmountType $corporateStockAmount = null,
        #[SerializedName('FullyPaidSharesIndicator')]
        protected ?Indicator $fullyPaidSharesIndicator = null,
        #[SerializedName('RegistrationAddress')]
        protected ?AddressType $registrationAddress = null,
        #[SerializedName('CorporateRegistrationScheme')]
        protected ?CorporateRegistrationSchemeType $corporateRegistrationScheme = null,
        #[SerializedName('HeadOfficeParty')]
        protected ?PartyType $headOfficeParty = null,
        #[SerializedName('ShareholderParty')]
        protected array $shareholderParties = []
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getRegistrationName(): ?NameType
    {
        return $this->registrationName;
    }

    public function setRegistrationName(?NameType $registrationName): void
    {
        $this->registrationName = $registrationName;
    }

    public function getCompanyID(): ?IdentifierType
    {
        return $this->companyID;
    }

    public function setCompanyID(?IdentifierType $companyID): void
    {
        $this->companyID = $companyID;
    }

    public function getRegistrationDate(): ?DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(?DateTimeInterface $registrationDate): void
    {
        $this->registrationDate = $registrationDate;
    }

    public function getRegistrationExpirationDate(): ?DateTimeInterface
    {
        return $this->registrationExpirationDate;
    }

    public function setRegistrationExpirationDate(?DateTimeInterface $registrationExpirationDate): void
    {
        $this->registrationExpirationDate = $registrationExpirationDate;
    }

    public function getCompanyLegalFormCode(): ?CodeType
    {
        return $this->companyLegalFormCode;
    }

    public function setCompanyLegalFormCode(?CodeType $companyLegalFormCode): void
    {
        $this->companyLegalFormCode = $companyLegalFormCode;
    }

    public function getCompanyLegalForm(): ?TextType
    {
        return $this->companyLegalForm;
    }

    public function setCompanyLegalForm(?TextType $companyLegalForm): void
    {
        $this->companyLegalForm = $companyLegalForm;
    }

    public function getSoleProprietorshipIndicator(): ?Indicator
    {
        return $this->soleProprietorshipIndicator;
    }

    public function setSoleProprietorshipIndicator(?Indicator $soleProprietorshipIndicator): void
    {
        $this->soleProprietorshipIndicator = $soleProprietorshipIndicator;
    }

    public function getCompanyLiquidationStatusCode(): ?CodeType
    {
        return $this->companyLiquidationStatusCode;
    }

    public function setCompanyLiquidationStatusCode(?CodeType $companyLiquidationStatusCode): void
    {
        $this->companyLiquidationStatusCode = $companyLiquidationStatusCode;
    }

    public function getCorporateStockAmount(): ?AmountType
    {
        return $this->corporateStockAmount;
    }

    public function setCorporateStockAmount(?AmountType $corporateStockAmount): void
    {
        $this->corporateStockAmount = $corporateStockAmount;
    }

    public function getFullyPaidSharesIndicator(): ?Indicator
    {
        return $this->fullyPaidSharesIndicator;
    }

    public function setFullyPaidSharesIndicator(?Indicator $fullyPaidSharesIndicator): void
    {
        $this->fullyPaidSharesIndicator = $fullyPaidSharesIndicator;
    }

    public function getRegistrationAddress(): ?AddressType
    {
        return $this->registrationAddress;
    }

    public function setRegistrationAddress(?AddressType $registrationAddress): void
    {
        $this->registrationAddress = $registrationAddress;
    }

    public function getCorporateRegistrationScheme(): ?CorporateRegistrationSchemeType
    {
        return $this->corporateRegistrationScheme;
    }

    public function setCorporateRegistrationScheme(?CorporateRegistrationSchemeType $corporateRegistrationScheme): void
    {
        $this->corporateRegistrationScheme = $corporateRegistrationScheme;
    }

    public function getHeadOfficeParty(): ?PartyType
    {
        return $this->headOfficeParty;
    }

    public function setHeadOfficeParty(?PartyType $headOfficeParty): void
    {
        $this->headOfficeParty = $headOfficeParty;
    }

    /**
     * @return PartyType[]
     */
    public function getShareholderParties(): array
    {
        return $this->shareholderParties;
    }

    /**
     * @param PartyType[] $shareholderParties
     * @return void
     */
    public function setShareholderParties(array $shareholderParties): void
    {
        $this->shareholderParties = [];
        foreach ($shareholderParties as $shareholderParty) {
            $this->addShareholderParty($shareholderParty);
        }
    }

    public function addShareholderParty(PartyType $party): self
    {
        $this->shareholderParties []= $party;
        return $this;
    }
}