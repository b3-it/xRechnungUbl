<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\TextType;

class MaritimeTransportType
{
    /**
     * @param TextType[] $shipsRequirements
     */
    public function __construct(
        #[SerializedName('VesselID')]
        public ?IdentifierType $vesselID = null,
        #[SerializedName('VesselName')]
        public ?NameType $vesselName = null,
        #[SerializedName('RadioCallSignID')]
        public ?IdentifierType $radioCallSignID = null,
        #[SerializedName('ShipsRequirements')]
        protected array $shipsRequirements = [],
        #[SerializedName('GrossTonnageMeasure')]
        public ?MeasureType $grossTonnageMeasure = null,
        #[SerializedName('NetTonnageMeasure')]
        public ?MeasureType $NetTonnageMeasure = null,
        #[SerializedName('RegistryCertificateDocumentReference')]
        protected ?DocumentReferenceType $registryCertificateDocumentReference = null,
        #[SerializedName('RegistryPortLocation')]
        protected ?LocationType $registryPortLocation = null,
    )
    {
    }

    /**
     * @return TextType[]
     */
    public function getShipsRequirements(): array
    {
        return $this->shipsRequirements;
    }

    /**
     * @param TextType[] $shipsRequirements
     * @return void
     */
    public function setShipsRequirements(array $shipsRequirements): void
    {
        $this->shipsRequirements = $shipsRequirements;
    }

    public function getRegistryCertificateDocumentReference(): ?DocumentReferenceType
    {
        return $this->registryCertificateDocumentReference;
    }

    public function setRegistryCertificateDocumentReference(?DocumentReferenceType $registryCertificateDocumentReference): void
    {
        $this->registryCertificateDocumentReference = $registryCertificateDocumentReference;
    }

    public function getRegistryPortLocation(): ?LocationType
    {
        return $this->registryPortLocation;
    }

    public function setRegistryPortLocation(?LocationType $registryPortLocation): void
    {
        $this->registryPortLocation = $registryPortLocation;
    }
}