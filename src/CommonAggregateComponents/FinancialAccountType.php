<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\TextType;

class FinancialAccountType
{


    /**
     * @param TextType[] $paymentNotes
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('AliasName')]
        protected ?NameType $aliasName = null,
        #[SerializedName('AccountTypeCode')]
        protected ?CodeType $accountTypeCode = null,
        #[SerializedName('AccountFormatCode')]
        protected ?CodeType $accountFormatCode = null,
        #[SerializedName('CurrencyCode')]
        protected ?CodeType $currencyCode = null,
        #[SerializedName('PaymentNote')]
        protected array $paymentNotes = [],
        #[SerializedName('FinancialInstitutionBranch')]
        protected ?BranchType $financialInstitutionBranch = null,
        #[SerializedName('Country')]
        protected ?CountryType $country = null
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

    public function getName(): ?NameType
    {
        return $this->name;
    }

    public function setName(?NameType $name): void
    {
        $this->name = $name;
    }

    public function getAliasName(): ?NameType
    {
        return $this->aliasName;
    }

    public function setAliasName(?NameType $aliasName): void
    {
        $this->aliasName = $aliasName;
    }

    public function getAccountTypeCode(): ?CodeType
    {
        return $this->accountTypeCode;
    }

    public function setAccountTypeCode(?CodeType $accountTypeCode): void
    {
        $this->accountTypeCode = $accountTypeCode;
    }

    public function getAccountFormatCode(): ?CodeType
    {
        return $this->accountFormatCode;
    }

    public function setAccountFormatCode(?CodeType $accountFormatCode): void
    {
        $this->accountFormatCode = $accountFormatCode;
    }

    public function getCurrencyCode(): ?CodeType
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(?CodeType $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return TextType[]
     */
    public function getPaymentNotes(): array
    {
        return $this->paymentNotes;
    }

    /**
     * @param TextType[] $paymentNotes
     * @return void
     */
    public function setPaymentNotes(array $paymentNotes): void
    {
        $this->paymentNotes = $paymentNotes;
    }

    public function getFinancialInstitutionBranch(): ?BranchType
    {
        return $this->financialInstitutionBranch;
    }

    public function setFinancialInstitutionBranch(?BranchType $financialInstitutionBranch): void
    {
        $this->financialInstitutionBranch = $financialInstitutionBranch;
    }

    public function getCountry(): ?CountryType
    {
        return $this->country;
    }

    public function setCountry(?CountryType $country): void
    {
        $this->country = $country;
    }
}