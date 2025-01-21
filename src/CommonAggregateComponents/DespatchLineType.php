<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class DespatchLineType
{

    /**
     * @param TextType[] $notes
     * @param TextType[] $backorderReasons
     * @param TextType[] $outstandingReasons
     * @param OrderLineReferenceType[] $orderLineReferences
     * @param DocumentReferenceType[] $documentReferences
     * @param ShipmentType[] $shipments
     */
    public function __construct(
        #[SerializedName("ID")]
        protected ?IdentifierType $iD = null,
        #[SerializedName("UUID")]
        protected ?IdentifierType $uUID = null,
        #[SerializedName("Note")]
        protected array $notes = [],
        #[SerializedName("LineStatusCode")]
        protected ?CodeType $lineStatusCode = null,
        #[SerializedName("DeliveredQuantity")]
        protected ?QuantityType $deliveredQuantity = null,
        #[SerializedName("BackorderQuantity")]
        protected ?QuantityType $backorderQuantity = null,
        #[SerializedName("BackorderReason")]
        protected array $backorderReasons = [],
        #[SerializedName("OutstandingQuantity")]
        protected ?QuantityType $outstandingQuantity = null,
        #[SerializedName("OutstandingReason")]
        protected array $outstandingReasons = [],
        #[SerializedName("OversupplyQuantity")]
        protected ?QuantityType $oversupplyQuantity = null,
        #[SerializedName("OrderLineReference")]
        protected array $orderLineReferences = [],
        #[SerializedName("DocumentReference")]
        protected array $documentReferences = [],
        #[SerializedName("Item")]
        protected ?ItemType $item = null,
        #[SerializedName("Shipment")]
        protected array $shipments = [],
    )
    {
    }
}