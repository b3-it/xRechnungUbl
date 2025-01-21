<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class ServiceProviderPartyType
{
    /**
     * @param TextType[] $serviceTypes
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('ServiceTypeCode')]
        protected ?CodeType $serviceTypeCode = null,
        #[SerializedName('ServiceType')]
        protected array $serviceTypes = [],
        #[SerializedName('Party')]
        protected ?PartyType $party = null,
        #[SerializedName('SellerContact')]
        protected ?ContactType $sellerContact = null
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

    public function getServiceTypeCode(): ?CodeType
    {
        return $this->serviceTypeCode;
    }

    public function setServiceTypeCode(?CodeType $serviceTypeCode): void
    {
        $this->serviceTypeCode = $serviceTypeCode;
    }

    /**
     * @return TextType[]
     */
    public function getServiceTypes(): array
    {
        return $this->serviceTypes;
    }

    /**
     * @param TextType[] $serviceTypes
     * @return void
     */
    public function setServiceTypes(array $serviceTypes): void
    {
        $this->serviceTypes = [];
        foreach ($serviceTypes as $serviceType) {
            $this->addServiceType($serviceType);
        }
    }

    public function addServiceType(TextType $type): void
    {
        $this->serviceTypes []= $type;
    }

    public function getParty(): ?PartyType
    {
        return $this->party;
    }

    public function setParty(?PartyType $party): void
    {
        $this->party = $party;
    }

    public function getSellerContact(): ?ContactType
    {
        return $this->sellerContact;
    }

    public function setSellerContact(?ContactType $sellerContact): void
    {
        $this->sellerContact = $sellerContact;
    }


}