<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class ReceiptLineType
{
    /**
     * @param TextType[] $notes
     * @param TextType[] $rejectReasons
     * @param LineReferenceType[] $despatchLineReferences
     * @param DocumentReferenceType[] $documentReferences
     * @param ItemType[] $items
     * @param ShipmentType[] $shipments
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('UUID')]
        protected ?IdentifierType $uuid = null,
        #[SerializedName('Note')]
        protected array $notes = [],
        #[SerializedName('ReceivedQuantity')]
        protected ?QuantityType $receivedQuantity = null,
        #[SerializedName('ShortQuantity')]
        protected ?QuantityType $shortQuantity = null,
        #[SerializedName('ShortageActionCode')]
        protected ?CodeType $shortageActionCode = null,
        #[SerializedName('RejectedQuantity')]
        protected ?QuantityType $rejectedQuantity = null,
        #[SerializedName('RejectReasonCode')]
        protected ?CodeType $rejectReasonCode = null,
        #[SerializedName('RejectReason')]
        protected array $rejectReasons = [],
        #[SerializedName('RejectActionCode')]
        protected ?CodeType $rejectActionCode = null,
        #[SerializedName('QuantityDiscrepancyCode')]
        protected ?CodeType $quantityDiscrepancyCode = null,
        #[SerializedName('OversupplyQuantity')]
        protected ?QuantityType $oversupplyQuantity = null,
        #[SerializedName('ReceivedDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $receivedDate = null,
        #[SerializedName('TimingComplaintCode')]
        protected ?CodeType $timingComplaintCode = null,
        #[SerializedName('TimingComplaint')]
        protected ?TextType $timingComplaint = null,
        #[SerializedName('OrderLineReference')]
        protected ?OrderLineReferenceType $orderLineReference = null,
        #[SerializedName('DespatchLineReference')]
        protected array $despatchLineReferences = [],
        #[SerializedName('DocumentReference')]
        protected array $documentReferences = [],
        #[SerializedName('Item')]
        protected array $items = [],
        #[SerializedName('Shipment')]
        protected array $shipments = [],
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

    public function getUuid(): ?IdentifierType
    {
        return $this->uuid;
    }

    public function setUuid(?IdentifierType $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return TextType[]
     */
    public function getNotes(): array
    {
        return $this->notes;
    }

    /**
     * @param TextType[] $notes
     * @return void
     */
    public function setNotes(array $notes): void
    {
        $this->notes = $notes;
    }

    public function getReceivedQuantity(): ?QuantityType
    {
        return $this->receivedQuantity;
    }

    public function setReceivedQuantity(?QuantityType $receivedQuantity): void
    {
        $this->receivedQuantity = $receivedQuantity;
    }

    public function getShortQuantity(): ?QuantityType
    {
        return $this->shortQuantity;
    }

    public function setShortQuantity(?QuantityType $shortQuantity): void
    {
        $this->shortQuantity = $shortQuantity;
    }

    public function getShortageActionCode(): ?CodeType
    {
        return $this->shortageActionCode;
    }

    public function setShortageActionCode(?CodeType $shortageActionCode): void
    {
        $this->shortageActionCode = $shortageActionCode;
    }

    public function getRejectedQuantity(): ?QuantityType
    {
        return $this->rejectedQuantity;
    }

    public function setRejectedQuantity(?QuantityType $rejectedQuantity): void
    {
        $this->rejectedQuantity = $rejectedQuantity;
    }

    public function getRejectReasonCode(): ?CodeType
    {
        return $this->rejectReasonCode;
    }

    public function setRejectReasonCode(?CodeType $rejectReasonCode): void
    {
        $this->rejectReasonCode = $rejectReasonCode;
    }

    /**
     * @return TextType[]
     */
    public function getRejectReasons(): array
    {
        return $this->rejectReasons;
    }

    /**
     * @param TextType[] $rejectReasons
     * @return void
     */
    public function setRejectReasons(array $rejectReasons): void
    {
        $this->rejectReasons = $rejectReasons;
    }

    public function getRejectActionCode(): ?CodeType
    {
        return $this->rejectActionCode;
    }

    public function setRejectActionCode(?CodeType $rejectActionCode): void
    {
        $this->rejectActionCode = $rejectActionCode;
    }

    public function getQuantityDiscrepancyCode(): ?CodeType
    {
        return $this->quantityDiscrepancyCode;
    }

    public function setQuantityDiscrepancyCode(?CodeType $quantityDiscrepancyCode): void
    {
        $this->quantityDiscrepancyCode = $quantityDiscrepancyCode;
    }

    public function getOversupplyQuantity(): ?QuantityType
    {
        return $this->oversupplyQuantity;
    }

    public function setOversupplyQuantity(?QuantityType $oversupplyQuantity): void
    {
        $this->oversupplyQuantity = $oversupplyQuantity;
    }

    public function getReceivedDate(): ?DateTimeInterface
    {
        return $this->receivedDate;
    }

    public function setReceivedDate(?DateTimeInterface $receivedDate): void
    {
        $this->receivedDate = $receivedDate;
    }

    public function getTimingComplaintCode(): ?CodeType
    {
        return $this->timingComplaintCode;
    }

    public function setTimingComplaintCode(?CodeType $timingComplaintCode): void
    {
        $this->timingComplaintCode = $timingComplaintCode;
    }

    public function getTimingComplaint(): ?TextType
    {
        return $this->timingComplaint;
    }

    public function setTimingComplaint(?TextType $timingComplaint): void
    {
        $this->timingComplaint = $timingComplaint;
    }

    public function getOrderLineReference(): ?OrderLineReferenceType
    {
        return $this->orderLineReference;
    }

    public function setOrderLineReference(?OrderLineReferenceType $orderLineReference): void
    {
        $this->orderLineReference = $orderLineReference;
    }

    /**
     * @return LineReferenceType[]
     */
    public function getDespatchLineReferences(): array
    {
        return $this->despatchLineReferences;
    }

    /**
     * @param LineReferenceType[] $despatchLineReferences
     * @return void
     */
    public function setDespatchLineReferences(array $despatchLineReferences): void
    {
        $this->despatchLineReferences = $despatchLineReferences;
    }

    /**
     * @return DocumentReferenceType[]
     */
    public function getDocumentReferences(): array
    {
        return $this->documentReferences;
    }

    /**
     * @param DocumentReferenceType[] $documentReferences
     * @return void
     */
    public function setDocumentReferences(array $documentReferences): void
    {
        $this->documentReferences = $documentReferences;
    }

    /**
     * @return ItemType[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ItemType[] $items
     * @return void
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return ShipmentType[]
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }

    /**
     * @param ShipmentType[] $shipments
     * @return void
     */
    public function setShipments(array $shipments): void
    {
        $this->shipments = $shipments;
    }
}