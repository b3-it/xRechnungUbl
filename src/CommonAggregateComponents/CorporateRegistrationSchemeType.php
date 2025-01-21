<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;

class CorporateRegistrationSchemeType
{

    /**
     * @param AddressType[] $jurisdictionRegionAddresses
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('CorporateRegistrationTypeCode')]
        protected ?CodeType $corporateRegistrationTypeCode = null,
        #[SerializedName('JurisdictionRegionAddress')]
        protected array $jurisdictionRegionAddresses = []
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

    public function getCorporateRegistrationTypeCode(): ?CodeType
    {
        return $this->corporateRegistrationTypeCode;
    }

    public function setCorporateRegistrationTypeCode(?CodeType $corporateRegistrationTypeCode): void
    {
        $this->corporateRegistrationTypeCode = $corporateRegistrationTypeCode;
    }

    /**
     * @return AddressType[]
     */
    public function getJurisdictionRegionAddresses(): array
    {
        return $this->jurisdictionRegionAddresses;
    }

    public function setJurisdictionRegionAddresses(array $jurisdictionRegionAddresses): void
    {
        $this->jurisdictionRegionAddresses = [];
        foreach ($jurisdictionRegionAddresses as $address) {
            $this->addJurisdictionRegionAddress($address);
        }
    }

    public function addJurisdictionRegionAddress(AddressType $address): self
    {
        $this->jurisdictionRegionAddresses []= $address;
        return $this;
    }
}