<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\TextType;

class LocationType
{
    /**
     * @param TextType[] $descriptions
     * @param TextType[] $conditions
     * @param PeriodType[] $validityPeriods
     * @param LocationType[] $subsidiaryLocations
     * @param LocationCoordinateType[] $locationCoordinates
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('Conditions')]
        protected array $conditions = [],
        #[SerializedName('CountrySubentity')]
        protected ?TextType $countrySubentity = null,
        #[SerializedName('CountrySubentityCode')]
        protected ?CodeType $countrySubentityCode = null,
        #[SerializedName('LocationTypeCode')]
        protected ?CodeType $locationTypeCode = null,
        #[SerializedName('InformationURI')]
        protected ?IdentifierType $informationURI = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('ValidityPeriod')]
        protected array $validityPeriods = [],
        #[SerializedName('Address')]
        protected ?AddressType $address = null,
        #[SerializedName('SubsidiaryLocation')]
        protected array $subsidiaryLocations = [],
        #[SerializedName('LocationCoordinate')]
        protected array $locationCoordinates = []
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

    /**
     * @return TextType[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param TextType[] $descriptions
     * @return void
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = [];
        foreach ($descriptions as $description) {
            $this->addDescription($description);
        }
    }

    public function addDescription(TextType $description): void
    {
        $this->descriptions []= $description;
    }

    /**
     * @return TextType[]
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * @param TextType[] $conditions
     * @return void
     */
    public function setConditions(array $conditions): void
    {
        $this->conditions = [];
        foreach ($conditions as $condition) {
            $this->addCondition($condition);
        }
    }

    public function addCondition(TextType $condition): void
    {
        $this->conditions []= $condition;
    }

    public function getCountrySubentity(): ?TextType
    {
        return $this->countrySubentity;
    }

    public function setCountrySubentity(?TextType $countrySubentity): void
    {
        $this->countrySubentity = $countrySubentity;
    }

    public function getCountrySubentityCode(): ?CodeType
    {
        return $this->countrySubentityCode;
    }

    public function setCountrySubentityCode(?CodeType $countrySubentityCode): void
    {
        $this->countrySubentityCode = $countrySubentityCode;
    }

    public function getLocationTypeCode(): ?CodeType
    {
        return $this->locationTypeCode;
    }

    public function setLocationTypeCode(?CodeType $locationTypeCode): void
    {
        $this->locationTypeCode = $locationTypeCode;
    }

    public function getInformationURI(): ?IdentifierType
    {
        return $this->informationURI;
    }

    public function setInformationURI(?IdentifierType $informationURI): void
    {
        $this->informationURI = $informationURI;
    }

    public function getName(): ?NameType
    {
        return $this->name;
    }

    public function setName(?NameType $name): void
    {
        $this->name = $name;
    }

    /**
     * @return PeriodType[]
     */
    public function getValidityPeriods(): array
    {
        return $this->validityPeriods;
    }

    /**
     * @param PeriodType[] $validityPeriods
     * @return void
     */
    public function setValidityPeriods(array $validityPeriods): void
    {
        $this->validityPeriods = [];
        foreach ($validityPeriods as $validityPeriod) {
            $this->addValidityPeriod($validityPeriod);
        }
    }

    public function addValidityPeriod(PeriodType $validityPeriod): void
    {
        $this->validityPeriods []= $validityPeriod;
    }

    public function getAddress(): ?AddressType
    {
        return $this->address;
    }

    public function setAddress(?AddressType $address): void
    {
        $this->address = $address;
    }

    /**
     * @return LocationType[]
     */
    public function getSubsidiaryLocations(): array
    {
        return $this->subsidiaryLocations;
    }

    /**
     * @param LocationType[] $subsidiaryLocations
     * @return void
     */
    public function setSubsidiaryLocations(array $subsidiaryLocations): void
    {
        $this->subsidiaryLocations = $subsidiaryLocations;
    }

    /**
     * @return LocationCoordinateType[]
     */
    public function getLocationCoordinates(): array
    {
        return $this->locationCoordinates;
    }

    /**
     * @param LocationCoordinateType[] $locationCoordinates
     * @return void
     */
    public function setLocationCoordinates(array $locationCoordinates): void
    {
        $this->locationCoordinates = [];
        foreach ($locationCoordinates as $locationCoordinate) {
            $this->addLocationCoordinate($locationCoordinate);
        }
    }

    public function addLocationCoordinate(LocationCoordinateType $locationCoordinate): void
    {
        $this->locationCoordinates []= $locationCoordinate;
    }
}