<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class TransportMeansType
{
    /**
     * @param TextType[] $RegistrationNationalities
     * @param DimensionType[] $measurementDimensions
     */
    public function __construct(
        #[SerializedName('JourneyID')]
        protected ?IdentifierType $journeyID = null,
        #[SerializedName('RegistrationNationalityID')]
        protected ?IdentifierType $registrationNationalityID = null,
        #[SerializedName('RegistrationNationality')]
        protected array $RegistrationNationalities = [],
        #[SerializedName('DirectionCode')]
        protected ?CodeType $directionCode = null,
        #[SerializedName('TransportMeansTypeCode')]
        protected ?CodeType $transportMeansTypeCode = null,
        #[SerializedName('TradeServiceCode')]
        protected ?CodeType $tradeServiceCode = null,
        #[SerializedName('Stowage')]
        protected ?StowageType $stowage = null,
        #[SerializedName('AirTransport')]
        protected ?AirTransportType $airTransport = null,
        #[SerializedName('RoadTransport')]
        protected ?RoadTransportType $roadTransport = null,
        #[SerializedName('RailTransport')]
        protected ?RailTransportType $railTransport = null,
        #[SerializedName('MaritimeTransport')]
        protected ?MaritimeTransportType  $maritimeTransport = null,
        #[SerializedName('OwnerParty')]
        protected ?PartyType $ownerParty = null,
        #[SerializedName('MeasurementDimension')]
        protected array $measurementDimensions = []
    )
    {
    }

    public function getJourneyID(): ?IdentifierType
    {
        return $this->journeyID;
    }

    public function setJourneyID(?IdentifierType $journeyID): void
    {
        $this->journeyID = $journeyID;
    }

    public function getRegistrationNationalityID(): ?IdentifierType
    {
        return $this->registrationNationalityID;
    }

    public function setRegistrationNationalityID(?IdentifierType $registrationNationalityID): void
    {
        $this->registrationNationalityID = $registrationNationalityID;
    }

    /**
     * @return TextType[]
     */
    public function getRegistrationNationalities(): array
    {
        return $this->RegistrationNationalities;
    }

    /**
     * @param TextType[] $RegistrationNationalities
     * @return void
     */
    public function setRegistrationNationalities(array $RegistrationNationalities): void
    {
        $this->RegistrationNationalities = $RegistrationNationalities;
    }

    public function getDirectionCode(): ?CodeType
    {
        return $this->directionCode;
    }

    public function setDirectionCode(?CodeType $directionCode): void
    {
        $this->directionCode = $directionCode;
    }

    public function getTransportMeansTypeCode(): ?CodeType
    {
        return $this->transportMeansTypeCode;
    }

    public function setTransportMeansTypeCode(?CodeType $transportMeansTypeCode): void
    {
        $this->transportMeansTypeCode = $transportMeansTypeCode;
    }

    public function getTradeServiceCode(): ?CodeType
    {
        return $this->tradeServiceCode;
    }

    public function setTradeServiceCode(?CodeType $tradeServiceCode): void
    {
        $this->tradeServiceCode = $tradeServiceCode;
    }

    public function getStowage(): ?StowageType
    {
        return $this->stowage;
    }

    public function setStowage(?StowageType $stowage): void
    {
        $this->stowage = $stowage;
    }

    public function getAirTransport(): ?AirTransportType
    {
        return $this->airTransport;
    }

    public function setAirTransport(?AirTransportType $airTransport): void
    {
        $this->airTransport = $airTransport;
    }

    public function getRoadTransport(): ?RoadTransportType
    {
        return $this->roadTransport;
    }

    public function setRoadTransport(?RoadTransportType $roadTransport): void
    {
        $this->roadTransport = $roadTransport;
    }

    public function getRailTransport(): ?RailTransportType
    {
        return $this->railTransport;
    }

    public function setRailTransport(?RailTransportType $railTransport): void
    {
        $this->railTransport = $railTransport;
    }

    public function getMaritimeTransport(): ?MaritimeTransportType
    {
        return $this->maritimeTransport;
    }

    public function setMaritimeTransport(?MaritimeTransportType $maritimeTransport): void
    {
        $this->maritimeTransport = $maritimeTransport;
    }

    public function getOwnerParty(): ?PartyType
    {
        return $this->ownerParty;
    }

    public function setOwnerParty(?PartyType $ownerParty): void
    {
        $this->ownerParty = $ownerParty;
    }

    /**
     * @return DimensionType[]
     */
    public function getMeasurementDimensions(): array
    {
        return $this->measurementDimensions;
    }

    /**
     * @param DimensionType[] $measurementDimensions
     * @return void
     */
    public function setMeasurementDimensions(array $measurementDimensions): void
    {
        $this->measurementDimensions = $measurementDimensions;
    }
}