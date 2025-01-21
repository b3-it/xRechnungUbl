<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\TextType;

class PartyTaxSchemeType
{

    /**
     * @param TextType[] $exemptionReasons
     */
    public function __construct(
        #[SerializedName('RegistrationName')]
        protected ?NameType $registrationName = null,
        #[SerializedName('CompanyID')]
        protected ?IdentifierType $companyID = null,
        #[SerializedName('TaxLevelCode')]
        protected ?CodeType $taxLevelCode = null,
        #[SerializedName('ExemptionReasonCode')]
        protected ?CodeType $exemptionReasonCode = null,
        #[SerializedName('ExemptionReason')]
        protected array $exemptionReasons = [],
        #[SerializedName('RegistrationAddress')]
        protected ?AddressType $registrationAddress = null,
        #[SerializedName('TaxScheme')]
        protected ?TaxSchemeType $taxScheme = null
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

    public function getTaxLevelCode(): ?CodeType
    {
        return $this->taxLevelCode;
    }

    public function setTaxLevelCode(?CodeType $taxLevelCode): void
    {
        $this->taxLevelCode = $taxLevelCode;
    }

    public function getExemptionReasonCode(): ?CodeType
    {
        return $this->exemptionReasonCode;
    }

    public function setExemptionReasonCode(?CodeType $exemptionReasonCode): void
    {
        $this->exemptionReasonCode = $exemptionReasonCode;
    }

    /**
     * @return TextType[]
     */
    public function getExemptionReasons(): array
    {
        return $this->exemptionReasons;
    }

    /**
     * @param TextType[] $exemptionReasons
     */
    public function setExemptionReasons(array $exemptionReasons): void
    {
        $this->exemptionReasons = [];
        foreach ($exemptionReasons as $reason) {
            $this->addExemptionReason($reason);
        }
    }
    public function addExemptionReason(TextType $reason): void
    {
        $this->exemptionReasons []= $reason;
    }

    public function getRegistrationAddress(): ?AddressType
    {
        return $this->registrationAddress;
    }

    public function setRegistrationAddress(?AddressType $registrationAddress): void
    {
        $this->registrationAddress = $registrationAddress;
    }

    public function getTaxScheme(): ?TaxSchemeType
    {
        return $this->taxScheme;
    }

    public function setTaxScheme(?TaxSchemeType $taxScheme): void
    {
        $this->taxScheme = $taxScheme;
    }
}