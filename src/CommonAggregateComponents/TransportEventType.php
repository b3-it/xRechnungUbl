<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\TextType;

class TransportEventType
{
    /**
     * @param TextType[] $descriptions
     * @param StatusType[] $currentStatuses
     * @param ContactType[] $contacts
     * @param PeriodType[] $periods
     */
    public function __construct(
        #[SerializedName('IdentificationID')]
        protected ?IdentifierType $identificationID = null,
        #[SerializedName('OccurrenceDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $occurrenceDate = null,
        #[SerializedName('OccurrenceTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $occurrenceTime = null,
        #[SerializedName('TransportEventTypeCode')]
        protected ?CodeType $transportEventTypeCode = null,
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('CompletionIndicator')]
        protected ?Indicator $completionIndicator = null,
        #[SerializedName('ReportedShipment')]
        protected ?ShipmentType $reportedShipment = null,
        #[SerializedName('CurrentStatus')]
        protected array $currentStatuses = [],
        #[SerializedName('Contact')]
        protected array $contacts = [],
        #[SerializedName('Location')]
        protected ?LocationType $location = null,
        #[SerializedName('Signature')]
        protected ?SignatureType $signature = null,
        #[SerializedName('Period')]
        protected array $periods = []
    )
    {
    }

    public function getIdentificationID(): ?IdentifierType
    {
        return $this->identificationID;
    }

    public function setIdentificationID(?IdentifierType $identificationID): void
    {
        $this->identificationID = $identificationID;
    }

    public function getOccurrenceDate(): ?DateTimeInterface
    {
        return $this->occurrenceDate;
    }

    public function setOccurrenceDate(?DateTimeInterface $occurrenceDate): void
    {
        $this->occurrenceDate = $occurrenceDate;
    }

    public function getOccurrenceTime(): ?DateTimeInterface
    {
        return $this->occurrenceTime;
    }

    public function setOccurrenceTime(?DateTimeInterface $occurrenceTime): void
    {
        $this->occurrenceTime = $occurrenceTime;
    }

    public function getTransportEventTypeCode(): ?CodeType
    {
        return $this->transportEventTypeCode;
    }

    public function setTransportEventTypeCode(?CodeType $transportEventTypeCode): void
    {
        $this->transportEventTypeCode = $transportEventTypeCode;
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
        $this->descriptions = $descriptions;
    }

    public function getCompletionIndicator(): ?Indicator
    {
        return $this->completionIndicator;
    }

    public function setCompletionIndicator(?Indicator $completionIndicator): void
    {
        $this->completionIndicator = $completionIndicator;
    }

    public function getReportedShipment(): ?ShipmentType
    {
        return $this->reportedShipment;
    }

    public function setReportedShipment(?ShipmentType $reportedShipment): void
    {
        $this->reportedShipment = $reportedShipment;
    }

    /**
     * @return StatusType[]
     */
    public function getCurrentStatuses(): array
    {
        return $this->currentStatuses;
    }

    /**
     * @param StatusType[] $currentStatuses
     * @return void
     */
    public function setCurrentStatuses(array $currentStatuses): void
    {
        $this->currentStatuses = $currentStatuses;
    }

    public function getContacts(): array
    {
        return $this->contacts;
    }

    public function setContacts(array $contacts): void
    {
        $this->contacts = $contacts;
    }

    public function getLocation(): ?LocationType
    {
        return $this->location;
    }

    public function setLocation(?LocationType $location): void
    {
        $this->location = $location;
    }

    public function getSignature(): ?SignatureType
    {
        return $this->signature;
    }

    public function setSignature(?SignatureType $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return PeriodType[]
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param PeriodType[] $periods
     * @return void
     */
    public function setPeriods(array $periods): void
    {
        $this->periods = $periods;
    }


}