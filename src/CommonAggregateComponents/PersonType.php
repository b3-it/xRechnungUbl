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

class PersonType
{
    /**
     * @param DocumentReferenceType[] $identityDocumentReferences
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('FirstName')]
        protected ?TextType $firstName = null,
        #[SerializedName('FamilyName')]
        protected ?TextType $familyName = null,
        #[SerializedName('Title')]
        protected ?TextType $title = null,
        #[SerializedName('MiddleName')]
        protected ?TextType $middleName = null,
        #[SerializedName('OtherName')]
        protected ?TextType $otherName = null,
        #[SerializedName('NameSuffix')]
        protected ?TextType $nameSuffix = null,
        #[SerializedName('JobTitle')]
        protected ?TextType $jobTitle = null,
        #[SerializedName('NationalityID')]
        protected ?IdentifierType $nationalityID = null,
        #[SerializedName('GenderCode')]
        protected ?CodeType $genderCode = null,
        #[SerializedName('BirthDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $birthDate = null,
        #[SerializedName('BirthplaceName')]
        protected ?TextType $birthplaceName = null,
        #[SerializedName('OrganizationDepartment')]
        protected ?TextType $organizationDepartment = null,
        #[SerializedName('Contact')]
        protected ?ContactType $contact = null,
        #[SerializedName('FinancialAccount')]
        protected ?FinancialAccountType $financialAccount = null,
        #[SerializedName('IdentityDocumentReference')]
        protected array $identityDocumentReferences = [],
        #[SerializedName('ResidenceAddress')]
        protected ?AddressType $residenceAddress = null
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

    public function getFirstName(): ?TextType
    {
        return $this->firstName;
    }

    public function setFirstName(?TextType $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getFamilyName(): ?TextType
    {
        return $this->familyName;
    }

    public function setFamilyName(?TextType $familyName): void
    {
        $this->familyName = $familyName;
    }

    public function getTitle(): ?TextType
    {
        return $this->title;
    }

    public function setTitle(?TextType $title): void
    {
        $this->title = $title;
    }

    public function getMiddleName(): ?TextType
    {
        return $this->middleName;
    }

    public function setMiddleName(?TextType $middleName): void
    {
        $this->middleName = $middleName;
    }

    public function getOtherName(): ?TextType
    {
        return $this->otherName;
    }

    public function setOtherName(?TextType $otherName): void
    {
        $this->otherName = $otherName;
    }

    public function getNameSuffix(): ?TextType
    {
        return $this->nameSuffix;
    }

    public function setNameSuffix(?TextType $nameSuffix): void
    {
        $this->nameSuffix = $nameSuffix;
    }

    public function getJobTitle(): ?TextType
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?TextType $jobTitle): void
    {
        $this->jobTitle = $jobTitle;
    }

    public function getNationalityID(): ?IdentifierType
    {
        return $this->nationalityID;
    }

    public function setNationalityID(?IdentifierType $nationalityID): void
    {
        $this->nationalityID = $nationalityID;
    }

    public function getGenderCode(): ?CodeType
    {
        return $this->genderCode;
    }

    public function setGenderCode(?CodeType $genderCode): void
    {
        $this->genderCode = $genderCode;
    }

    public function getBirthDate(): ?DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?DateTimeInterface $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getBirthplaceName(): ?TextType
    {
        return $this->birthplaceName;
    }

    public function setBirthplaceName(?TextType $birthplaceName): void
    {
        $this->birthplaceName = $birthplaceName;
    }

    public function getOrganizationDepartment(): ?TextType
    {
        return $this->organizationDepartment;
    }

    public function setOrganizationDepartment(?TextType $organizationDepartment): void
    {
        $this->organizationDepartment = $organizationDepartment;
    }

    public function getContact(): ?ContactType
    {
        return $this->contact;
    }

    public function setContact(?ContactType $contact): void
    {
        $this->contact = $contact;
    }

    public function getFinancialAccount(): ?FinancialAccountType
    {
        return $this->financialAccount;
    }

    public function setFinancialAccount(?FinancialAccountType $financialAccount): void
    {
        $this->financialAccount = $financialAccount;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getIdentityDocumentReferences(): array
    {
        return $this->identityDocumentReferences;
    }

    /**
     * @param DocumentReferenceType[] $identityDocumentReferences
     * @return void
     */
    public function setIdentityDocumentReferences(array $identityDocumentReferences): void
    {
        $this->identityDocumentReferences = [];
        foreach ($identityDocumentReferences as $documentReference) {
            $this->addIdentityDocumentReference($documentReference);
        }
    }

    public function addIdentityDocumentReference(?DocumentReferenceType $documentReference = null): DocumentReferenceType
    {
        return $this->identityDocumentReferences []= $documentReference ?? new DocumentReferenceType;
    }

    public function getResidenceAddress(): ?AddressType
    {
        return $this->residenceAddress;
    }

    public function setResidenceAddress(?AddressType $residenceAddress): void
    {
        $this->residenceAddress = $residenceAddress;
    }
}