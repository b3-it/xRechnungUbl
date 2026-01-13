<?php

namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;

class TaxSchemeType
{

    /**
     * @param AddressType[] $jurisdictionRegionAddresses
     */
    public function __construct(

        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('TaxTypeCode')]
        protected ?CodeType $taxTypeCode = null,
        #[SerializedName('CurrencyCode')]
        protected ?CodeType $currencyCode = null,
        #[Assert\Valid]
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

    public function getTaxTypeCode(): ?CodeType
    {
        return $this->taxTypeCode;
    }

    public function setTaxTypeCode(?CodeType $taxTypeCode): void
    {
        $this->taxTypeCode = $taxTypeCode;
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
     * @return AddressType[]
     */
    public function getJurisdictionRegionAddresses(): array
    {
        return $this->jurisdictionRegionAddresses;
    }

    /**
     * @param AddressType[] $jurisdictionRegionAddresses
     * @return void
     */
    public function setJurisdictionRegionAddresses(array $jurisdictionRegionAddresses): void
    {
        $this->jurisdictionRegionAddresses = $jurisdictionRegionAddresses;
    }

    public function addJurisdictionRegionAddress(?AddressType $address = null): AddressType
    {
        return $this->jurisdictionRegionAddresses []= $address ?? new AddressType;
    }
}