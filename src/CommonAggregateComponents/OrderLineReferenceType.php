<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;

class OrderLineReferenceType
{
    public function __construct(
        #[SerializedName('LineID')]
        protected ?IdentifierType $lineID = null,
        #[SerializedName('SalesOrderLineID')]
        protected ?IdentifierType $salesOrderLineID = null,
        #[SerializedName('UUID')]
        protected ?IdentifierType $uuid = null,
        #[SerializedName('LineStatusCode')]
        protected ?CodeType $lineStatusCode = null,
        #[SerializedName('OrderReference')]
        protected ?OrderReferenceType $orderReference = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getLineID(): ?IdentifierType
    {
        return $this->lineID;
    }

    public function setLineID(?IdentifierType $lineID): void
    {
        $this->lineID = $lineID;
    }

    public function getSalesOrderLineID(): ?IdentifierType
    {
        return $this->salesOrderLineID;
    }

    public function setSalesOrderLineID(?IdentifierType $salesOrderLineID): void
    {
        $this->salesOrderLineID = $salesOrderLineID;
    }

    public function getUuid(): ?IdentifierType
    {
        return $this->uuid;
    }

    public function setUuid(?IdentifierType $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getLineStatusCode(): ?CodeType
    {
        return $this->lineStatusCode;
    }

    public function setLineStatusCode(?CodeType $lineStatusCode): void
    {
        $this->lineStatusCode = $lineStatusCode;
    }

    public function getOrderReference(): ?OrderReferenceType
    {
        return $this->orderReference;
    }

    public function setOrderReference(?OrderReferenceType $orderReference): void
    {
        $this->orderReference = $orderReference;
    }
}