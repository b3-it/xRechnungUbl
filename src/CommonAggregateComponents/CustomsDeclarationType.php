<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;

class CustomsDeclarationType
{
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id,
        #[SerializedName('IssuerParty')]
        protected ?PartyType $issuerParty
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

    public function getIssuerParty(): ?PartyType
    {
        return $this->issuerParty;
    }

    public function setIssuerParty(?PartyType $issuerParty): void
    {
        $this->issuerParty = $issuerParty;
    }
}