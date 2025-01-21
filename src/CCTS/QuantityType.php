<?php /** @noinspection PhpUnused */


namespace UBL\CCTS;

use Symfony\Component\Serializer\Attribute\SerializedName;

class QuantityType
{
    public function __construct(
        #[SerializedName('#')]
        protected float $value,
        #[SerializedName('@unitCode')]
        protected ?string $unitCode = null,
        #[SerializedName('@unitCodeListID')]
        protected ?string $unitCodeListID = null,
        #[SerializedName('@unitCodeListAgencyID')]
        protected ?string $unitCodeListAgencyID = null,
        #[SerializedName('@unitCodeListAgencyName')]
        protected ?string $unitCodeListAgencyName = null
    )
    {
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    public function setUnitCode(?string $unitCode): void
    {
        $this->unitCode = $unitCode;
    }

    public function getUnitCodeListID(): ?string
    {
        return $this->unitCodeListID;
    }

    public function setUnitCodeListID(?string $unitCodeListID): void
    {
        $this->unitCodeListID = $unitCodeListID;
    }

    public function getUnitCodeListAgencyID(): ?string
    {
        return $this->unitCodeListAgencyID;
    }

    public function setUnitCodeListAgencyID(?string $unitCodeListAgencyID): void
    {
        $this->unitCodeListAgencyID = $unitCodeListAgencyID;
    }

    public function getUnitCodeListAgencyName(): ?string
    {
        return $this->unitCodeListAgencyName;
    }

    public function setUnitCodeListAgencyName(?string $unitCodeListAgencyName): void
    {
        $this->unitCodeListAgencyName = $unitCodeListAgencyName;
    }
}