<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class TransportEquipmentSealType
{
    public function __construct(
        #[SerializedName('ID')]
        protected IdentifierType $id,
        #[SerializedName('SealIssuerTypeCode')]
        protected ?CodeType $sealIssuerTypeCode = null,
        #[SerializedName('Condition')]
        protected ?TextType $condition = null,
        #[SerializedName('SealStatusCode')]
        protected ?CodeType $sealStatusCode = null,
        #[SerializedName('SealingPartyType')]
        protected ?TextType $sealingPartyType = null
    )
    {
    }

    public function getId(): IdentifierType
    {
        return $this->id;
    }

    public function setId(IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getSealIssuerTypeCode(): ?CodeType
    {
        return $this->sealIssuerTypeCode;
    }

    public function setSealIssuerTypeCode(?CodeType $sealIssuerTypeCode): void
    {
        $this->sealIssuerTypeCode = $sealIssuerTypeCode;
    }

    public function getCondition(): ?TextType
    {
        return $this->condition;
    }

    public function setCondition(?TextType $condition): void
    {
        $this->condition = $condition;
    }

    public function getSealStatusCode(): ?CodeType
    {
        return $this->sealStatusCode;
    }

    public function setSealStatusCode(?CodeType $sealStatusCode): void
    {
        $this->sealStatusCode = $sealStatusCode;
    }

    public function getSealingPartyType(): ?TextType
    {
        return $this->sealingPartyType;
    }

    public function setSealingPartyType(?TextType $sealingPartyType): void
    {
        $this->sealingPartyType = $sealingPartyType;
    }
}