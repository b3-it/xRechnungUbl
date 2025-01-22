<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class DespatchType
{
    /**
     * @param TextType[] $instructions
     * @param PartyType[] $notifyParties
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('RequestedDespatchDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $requestedDespatchDate = null,
        #[SerializedName('RequestedDespatchTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $requestedDespatchTime = null,
        #[SerializedName('EstimatedDespatchDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $estimatedDespatchDate = null,
        #[SerializedName('EstimatedDespatchTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $estimatedDespatchTime = null,
        #[SerializedName('ActualDespatchDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $actualDespatchDate = null,
        #[SerializedName('ActualDespatchTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $actualDespatchTime = null,
        #[SerializedName('GuaranteedDespatchDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $guaranteedDespatchDate = null,
        #[SerializedName('GuaranteedDespatchTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $guaranteedDespatchTime = null,
        #[SerializedName('ReleaseID')]
        protected ?IdentifierType $releaseID = null,
        #[SerializedName('Instructions')]
        protected array $instructions = [],
        #[SerializedName('DespatchAddress')]
        protected ?AddressType $despatchAddress = null,
        #[SerializedName('DespatchLocation')]
        protected ?LocationType $despatchLocation = null,
        #[SerializedName('DespatchParty')]
        protected ?PartyType $despatchParty = null,
        #[SerializedName('CarrierParty')]
        protected ?PartyType $carrierParty = null,
        #[SerializedName('NotifyParty')]
        protected array $notifyParties = [],
        #[SerializedName('Contact')]
        protected ?ContactType $Contact = null,
        #[SerializedName('EstimatedDespatchPeriod')]
        protected ?PeriodType $estimatedDespatchPeriod = null,
        #[SerializedName('RequestedDespatchPeriod')]
        protected ?PeriodType $requestedDespatchPeriod = null,
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

    public function getRequestedDespatchDate(): ?DateTimeInterface
    {
        return $this->requestedDespatchDate;
    }

    public function setRequestedDespatchDate(?DateTimeInterface $requestedDespatchDate): void
    {
        $this->requestedDespatchDate = $requestedDespatchDate;
    }

    public function getRequestedDespatchTime(): ?DateTimeInterface
    {
        return $this->requestedDespatchTime;
    }

    public function setRequestedDespatchTime(?DateTimeInterface $requestedDespatchTime): void
    {
        $this->requestedDespatchTime = $requestedDespatchTime;
    }

    public function getEstimatedDespatchDate(): ?DateTimeInterface
    {
        return $this->estimatedDespatchDate;
    }

    public function setEstimatedDespatchDate(?DateTimeInterface $estimatedDespatchDate): void
    {
        $this->estimatedDespatchDate = $estimatedDespatchDate;
    }

    public function getEstimatedDespatchTime(): ?DateTimeInterface
    {
        return $this->estimatedDespatchTime;
    }

    public function setEstimatedDespatchTime(?DateTimeInterface $estimatedDespatchTime): void
    {
        $this->estimatedDespatchTime = $estimatedDespatchTime;
    }

    public function getActualDespatchDate(): ?DateTimeInterface
    {
        return $this->actualDespatchDate;
    }

    public function setActualDespatchDate(?DateTimeInterface $actualDespatchDate): void
    {
        $this->actualDespatchDate = $actualDespatchDate;
    }

    public function getActualDespatchTime(): ?DateTimeInterface
    {
        return $this->actualDespatchTime;
    }

    public function setActualDespatchTime(?DateTimeInterface $actualDespatchTime): void
    {
        $this->actualDespatchTime = $actualDespatchTime;
    }

    public function getGuaranteedDespatchDate(): ?DateTimeInterface
    {
        return $this->guaranteedDespatchDate;
    }

    public function setGuaranteedDespatchDate(?DateTimeInterface $guaranteedDespatchDate): void
    {
        $this->guaranteedDespatchDate = $guaranteedDespatchDate;
    }

    public function getGuaranteedDespatchTime(): ?DateTimeInterface
    {
        return $this->guaranteedDespatchTime;
    }

    public function setGuaranteedDespatchTime(?DateTimeInterface $guaranteedDespatchTime): void
    {
        $this->guaranteedDespatchTime = $guaranteedDespatchTime;
    }

    public function getReleaseID(): ?IdentifierType
    {
        return $this->releaseID;
    }

    public function setReleaseID(?IdentifierType $releaseID): void
    {
        $this->releaseID = $releaseID;
    }

    /**
     * @return TextType[]
     */
    public function getInstructions(): array
    {
        return $this->instructions;
    }

    /**
     * @param TextType[] $instructions
     * @return void
     */
    public function setInstructions(array $instructions): void
    {
        $this->instructions = [];
        foreach ($instructions as $instruction) {
            $this->addInstruction($instruction);
        }
    }

    public function addInstruction(?TextType $instruction = null): TextType
    {
        return $this->instructions []= $instruction ?? new TextType;
    }

    public function getDespatchAddress(): ?AddressType
    {
        return $this->despatchAddress;
    }

    public function setDespatchAddress(?AddressType $despatchAddress): void
    {
        $this->despatchAddress = $despatchAddress;
    }

    public function getDespatchLocation(): ?LocationType
    {
        return $this->despatchLocation;
    }

    public function setDespatchLocation(?LocationType $despatchLocation): void
    {
        $this->despatchLocation = $despatchLocation;
    }

    public function getDespatchParty(): ?PartyType
    {
        return $this->despatchParty;
    }

    public function setDespatchParty(?PartyType $despatchParty): void
    {
        $this->despatchParty = $despatchParty;
    }

    public function getCarrierParty(): ?PartyType
    {
        return $this->carrierParty;
    }

    public function setCarrierParty(?PartyType $carrierParty): void
    {
        $this->carrierParty = $carrierParty;
    }

    /**
     * @return PartyType[]
     */
    public function getNotifyParties(): array
    {
        return $this->notifyParties;
    }

    /**
     * @param PartyType[] $notifyParties
     * @return void
     */
    public function setNotifyParties(array $notifyParties): void
    {
        $this->notifyParties = [];
        foreach ($notifyParties as $party) {
            $this->addNotifyParty($party);
        }
    }

    public function addNotifyParty(?PartyType $party = null): PartyType
    {
        return $this->notifyParties []= $party ?? new PartyType();
    }

    public function getContact(): ?ContactType
    {
        return $this->Contact;
    }

    public function setContact(?ContactType $Contact): void
    {
        $this->Contact = $Contact;
    }

    public function getEstimatedDespatchPeriod(): ?PeriodType
    {
        return $this->estimatedDespatchPeriod;
    }

    public function setEstimatedDespatchPeriod(?PeriodType $estimatedDespatchPeriod): void
    {
        $this->estimatedDespatchPeriod = $estimatedDespatchPeriod;
    }

    public function getRequestedDespatchPeriod(): ?PeriodType
    {
        return $this->requestedDespatchPeriod;
    }

    public function setRequestedDespatchPeriod(?PeriodType $requestedDespatchPeriod): void
    {
        $this->requestedDespatchPeriod = $requestedDespatchPeriod;
    }


}