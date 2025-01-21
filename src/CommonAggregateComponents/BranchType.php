<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;

class BranchType
{


    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('FinancialInstitution')]
        protected ?FinancialInstitutionType $financialInstitution = null,
        #[SerializedName('Address')]
        protected ?AddressType $address = null
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

    public function getFinancialInstitution(): ?FinancialInstitutionType
    {
        return $this->financialInstitution;
    }

    public function setFinancialInstitution(?FinancialInstitutionType $financialInstitution): void
    {
        $this->financialInstitution = $financialInstitution;
    }

    public function getAddress(): ?AddressType
    {
        return $this->address;
    }

    public function setAddress(?AddressType $address): void
    {
        $this->address = $address;
    }
}