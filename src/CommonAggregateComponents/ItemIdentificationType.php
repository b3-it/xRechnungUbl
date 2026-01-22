<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use UBL\UnqualifiedDataTypes\IdentifierType;

class ItemIdentificationType
{
    /**
     * @param PhysicalAttributeType[] $physicalAttributes
     * @param DimensionType[] $measurementDimensions
     */
    public function __construct(
        #[Assert\NotNull]
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('ExtendedID')]
        protected ?IdentifierType $extendedID = null,
        #[SerializedName('BarcodeSymbologyID')]
        protected ?IdentifierType $barcodeSymbologyID = null,
        #[SerializedName('PhysicalAttribute')]
        protected array $physicalAttributes = [],
        #[SerializedName('MeasurementDimension')]
        protected array $measurementDimensions = [],
        #[SerializedName('IssuerParty')]
        protected ?PartyType $issuerParty = null
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

    public function getExtendedID(): ?IdentifierType
    {
        return $this->extendedID;
    }

    public function setExtendedID(?IdentifierType $extendedID): void
    {
        $this->extendedID = $extendedID;
    }

    public function getBarcodeSymbologyID(): ?IdentifierType
    {
        return $this->barcodeSymbologyID;
    }

    public function setBarcodeSymbologyID(?IdentifierType $barcodeSymbologyID): void
    {
        $this->barcodeSymbologyID = $barcodeSymbologyID;
    }

    public function getPhysicalAttributes(): array
    {
        return $this->physicalAttributes;
    }

    public function setPhysicalAttributes(array $physicalAttributes): void
    {
        $this->physicalAttributes = $physicalAttributes;
    }

    public function getMeasurementDimensions(): array
    {
        return $this->measurementDimensions;
    }

    public function setMeasurementDimensions(array $measurementDimensions): void
    {
        $this->measurementDimensions = $measurementDimensions;
    }

    public function getIssuerParty(): ?PartyType
    {
        return $this->issuerParty;
    }

    public function setIssuerParty(?PartyType $issuerParty): void
    {
        $this->issuerParty = $issuerParty;
    }
}