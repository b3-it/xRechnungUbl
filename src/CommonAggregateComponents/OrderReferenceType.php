<?php


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

class OrderReferenceType
{
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('SalesOrderID')]
        protected ?IdentifierType $salesOrderID = null,
        #[SerializedName('CopyIndicator')]
        protected ?Indicator $copyIndicator = null,
        #[SerializedName('UUID')]
        protected ?IdentifierType $uuid = null,
        #[SerializedName('IssueDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $issueDate = null,
        #[SerializedName('IssueTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $issueTime = null,
        #[SerializedName('CustomerReference')]
        protected ?TextType $customerReference = null,
        #[SerializedName('OrderTypeCode')]
        protected ?CodeType $orderTypeCode = null,
        #[SerializedName('DocumentReference')]
        protected ?DocumentReferenceType $documentReference = null
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

    public function getSalesOrderID(): ?IdentifierType
    {
        return $this->salesOrderID;
    }

    public function setSalesOrderID(?IdentifierType $salesOrderID): void
    {
        $this->salesOrderID = $salesOrderID;
    }

    public function getCopyIndicator(): ?Indicator
    {
        return $this->copyIndicator;
    }

    public function setCopyIndicator(?Indicator $copyIndicator): void
    {
        $this->copyIndicator = $copyIndicator;
    }

    public function getUuid(): ?IdentifierType
    {
        return $this->uuid;
    }

    public function setUuid(?IdentifierType $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(?DateTimeInterface $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    public function setIssueTime(?DateTimeInterface $issueTime): void
    {
        $this->issueTime = $issueTime;
    }

    public function getCustomerReference(): ?TextType
    {
        return $this->customerReference;
    }

    public function setCustomerReference(?TextType $customerReference): void
    {
        $this->customerReference = $customerReference;
    }

    public function getOrderTypeCode(): ?CodeType
    {
        return $this->orderTypeCode;
    }

    public function setOrderTypeCode(?CodeType $orderTypeCode): void
    {
        $this->orderTypeCode = $orderTypeCode;
    }

    public function getDocumentReference(): ?DocumentReferenceType
    {
        return $this->documentReference;
    }

    public function setDocumentReference(?DocumentReferenceType $documentReference): void
    {
        $this->documentReference = $documentReference;
    }
}