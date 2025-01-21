<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\PercentType;

class DependentPriceReferenceType
{
    public function __construct(
        #[SerializedName('Percent')]
        protected ?PercentType $percent = null,
        #[SerializedName('LocationAddress')]
        protected ?AddressType $locationAddress = null,
        #[SerializedName('DependentLineReference')]
        protected ?LineReferenceType $dependentLineReference = null
    )
    {
    }

    public function getPercent(): ?PercentType
    {
        return $this->percent;
    }

    public function setPercent(?PercentType $percent): void
    {
        $this->percent = $percent;
    }

    public function getLocationAddress(): ?AddressType
    {
        return $this->locationAddress;
    }

    public function setLocationAddress(?AddressType $locationAddress): void
    {
        $this->locationAddress = $locationAddress;
    }

    public function getDependentLineReference(): ?LineReferenceType
    {
        return $this->dependentLineReference;
    }

    public function setDependentLineReference(?LineReferenceType $dependentLineReference): void
    {
        $this->dependentLineReference = $dependentLineReference;
    }
}