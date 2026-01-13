<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\TextType;

class AddressType
{


    /**
     * @param AddressLineType[] $addressLines
     * @param LocationCoordinateType[] $locationCoordinates
     */
    public function __construct(
        #[SerializedName("ID")]
        protected ?IdentifierType $id = null,
        #[SerializedName("AddressTypeCode")]
        protected ?CodeType $addressTypeCode = null,
        #[SerializedName("AddressFormatCode")]
        protected ?CodeType $addressFormatCode = null,
        #[SerializedName("Postbox")]
        protected ?TextType $postbox = null,
        #[SerializedName("Floor")]
        protected ?TextType $floor = null,
        #[SerializedName("Room")]
        protected ?TextType $room = null,
        #[SerializedName("StreetName")]
        protected ?NameType $streetName = null,
        #[SerializedName("AdditionalStreetName")]
        protected ?NameType $additionalStreetName = null,
        #[SerializedName("BlockName")]
        protected ?NameType $blockName = null,
        #[SerializedName("BuildingName")]
        protected ?NameType $buildingName = null,
        #[SerializedName("BuildingNumber")]
        protected ?TextType $buildingNumber = null,
        #[SerializedName("InhouseMail")]
        protected ?TextType $inhouseMail = null,
        #[SerializedName("Department")]
        protected ?TextType $department = null,
        #[SerializedName("MarkAttention")]
        protected ?TextType $markAttention = null,
        #[SerializedName("MarkCare")]
        protected ?TextType $markCare = null,
        #[SerializedName("PlotIdentification")]
        protected ?TextType $plotIdentification = null,
        #[SerializedName("CitySubdivisionName")]
        protected ?NameType $citySubdivisionName = null,
        #[SerializedName("CityName")]
        protected ?NameType $cityName = null,
        #[SerializedName("PostalZone")]
        protected ?TextType $postalZone = null,
        #[SerializedName("CountrySubentity")]
        protected ?TextType $countrySubentity = null,
        #[SerializedName("CountrySubentityCode")]
        protected ?CodeType $countrySubentityCode = null,
        #[SerializedName("Region")]
        protected ?TextType $region = null,
        #[SerializedName("District")]
        protected ?TextType $district = null,
        #[SerializedName("TimezoneOffset")]
        protected ?TextType $timezoneOffset = null,
        #[Assert\Count(max: 1, maxMessage: '[UBL-SR-51]-An address can only have one third line.')]
        #[SerializedName('AddressLine')]
        protected array $addressLines = [],
        #[SerializedName('Country')]
        protected ?CountryType $country = null,
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

    public function getAddressTypeCode(): ?CodeType
    {
        return $this->addressTypeCode;
    }

    public function setAddressTypeCode(?CodeType $addressTypeCode): void
    {
        $this->addressTypeCode = $addressTypeCode;
    }

    public function getAddressFormatCode(): ?CodeType
    {
        return $this->addressFormatCode;
    }

    public function setAddressFormatCode(?CodeType $addressFormatCode): void
    {
        $this->addressFormatCode = $addressFormatCode;
    }

    public function getPostbox(): ?TextType
    {
        return $this->postbox;
    }

    public function setPostbox(?TextType $postbox): void
    {
        $this->postbox = $postbox;
    }

    public function getFloor(): ?TextType
    {
        return $this->floor;
    }

    public function setFloor(?TextType $floor): void
    {
        $this->floor = $floor;
    }

    public function getRoom(): ?TextType
    {
        return $this->room;
    }

    public function setRoom(?TextType $room): void
    {
        $this->room = $room;
    }

    public function getStreetName(): ?NameType
    {
        return $this->streetName;
    }

    public function setStreetName(?NameType $streetName): void
    {
        $this->streetName = $streetName;
    }

    public function getAdditionalStreetName(): ?NameType
    {
        return $this->additionalStreetName;
    }

    public function setAdditionalStreetName(?NameType $additionalStreetName): void
    {
        $this->additionalStreetName = $additionalStreetName;
    }

    public function getBlockName(): ?NameType
    {
        return $this->blockName;
    }

    public function setBlockName(?NameType $blockName): void
    {
        $this->blockName = $blockName;
    }

    public function getBuildingName(): ?NameType
    {
        return $this->buildingName;
    }

    public function setBuildingName(?NameType $buildingName): void
    {
        $this->buildingName = $buildingName;
    }

    public function getBuildingNumber(): ?TextType
    {
        return $this->buildingNumber;
    }

    public function setBuildingNumber(?TextType $buildingNumber): void
    {
        $this->buildingNumber = $buildingNumber;
    }

    public function getInhouseMail(): ?TextType
    {
        return $this->inhouseMail;
    }

    public function setInhouseMail(?TextType $inhouseMail): void
    {
        $this->inhouseMail = $inhouseMail;
    }

    public function getDepartment(): ?TextType
    {
        return $this->department;
    }

    public function setDepartment(?TextType $department): void
    {
        $this->department = $department;
    }

    public function getMarkAttention(): ?TextType
    {
        return $this->markAttention;
    }

    public function setMarkAttention(?TextType $markAttention): void
    {
        $this->markAttention = $markAttention;
    }

    public function getMarkCare(): ?TextType
    {
        return $this->markCare;
    }

    public function setMarkCare(?TextType $markCare): void
    {
        $this->markCare = $markCare;
    }

    public function getPlotIdentification(): ?TextType
    {
        return $this->plotIdentification;
    }

    public function setPlotIdentification(?TextType $plotIdentification): void
    {
        $this->plotIdentification = $plotIdentification;
    }

    public function getCitySubdivisionName(): ?NameType
    {
        return $this->citySubdivisionName;
    }

    public function setCitySubdivisionName(?NameType $citySubdivisionName): void
    {
        $this->citySubdivisionName = $citySubdivisionName;
    }

    public function getCityName(): ?NameType
    {
        return $this->cityName;
    }

    public function setCityName(?NameType $cityName): void
    {
        $this->cityName = $cityName;
    }

    public function getPostalZone(): ?TextType
    {
        return $this->postalZone;
    }

    public function setPostalZone(?TextType $postalZone): void
    {
        $this->postalZone = $postalZone;
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

    public function getRegion(): ?TextType
    {
        return $this->region;
    }

    public function setRegion(?TextType $region): void
    {
        $this->region = $region;
    }

    public function getDistrict(): ?TextType
    {
        return $this->district;
    }

    public function setDistrict(?TextType $district): void
    {
        $this->district = $district;
    }

    public function getTimezoneOffset(): ?TextType
    {
        return $this->timezoneOffset;
    }

    public function setTimezoneOffset(?TextType $timezoneOffset): void
    {
        $this->timezoneOffset = $timezoneOffset;
    }

    /**
     * @return AddressLineType[]
     */
    public function getAddressLines(): array
    {
        return $this->addressLines;
    }

    /**
     * @param AddressLineType[] $addressLines
     * @return void
     */
    public function setAddressLines(array $addressLines): void
    {
        $this->addressLines = [];
        foreach ($addressLines as $addressLine) {
            $this->addAddressLine($addressLine);
        }
    }
    public function addAddressLine(?AddressLineType $addressLine = null): AddressLineType
    {
        return $this->addressLines []= $addressLine ?? new AddressLineType();
    }

    public function getCountry(): ?CountryType
    {
        return $this->country;
    }

    public function setCountry(?CountryType $country): void
    {
        $this->country = $country;
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
        $this->locationCoordinates = $locationCoordinates;
    }

    public function addLocationCoordinate(?LocationCoordinateType $locationCoordinate = null): LocationCoordinateType
    {
        return $this->locationCoordinates []= $locationCoordinate ?? new LocationCoordinateType;
    }
}