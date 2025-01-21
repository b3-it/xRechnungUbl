<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\QuantityType;

class GoodsItemContainerType
{
    /**
     * @param TransportEquipmentType[] $transportEquipments
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id,
        #[SerializedName('Quantity')]
        protected ?QuantityType $quantity = null,
        #[SerializedName('TransportEquipment')]
        protected array $transportEquipments = [],
    )
    {}

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getQuantity(): ?QuantityType
    {
        return $this->quantity;
    }

    public function setQuantity(?QuantityType $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return TransportEquipmentType[]
     */
    public function getTransportEquipments(): array
    {
        return $this->transportEquipments;
    }

    /**
     * @param TransportEquipmentType[] $transportEquipments
     * @return void
     */
    public function setTransportEquipments(array $transportEquipments): void
    {
        $this->transportEquipments = $transportEquipments;
    }


}