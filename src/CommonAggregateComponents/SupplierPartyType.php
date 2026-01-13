<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class SupplierPartyType
{
    /**
     * @param IdentifierType[] $additionalAccountIDs
     */
    public function __construct(
        #[SerializedName('CustomerAssignedAccountID')]
        protected ?IdentifierType $customerAssignedAccountID = null,
        #[SerializedName('AdditionalAccountID')]
        protected array $additionalAccountIDs = [],
        #[SerializedName('DataSendingCapability')]
        protected ?TextType $dataSendingCapability = null,
        #[Assert\Valid]
        #[SerializedName('Party')]
        protected ?PartyType $party = null,
        #[SerializedName('DespatchContact')]
        protected ?ContactType $despatchContact = null,
        #[SerializedName('AccountingContact')]
        protected ?ContactType $accountingContact = null,
        #[SerializedName('SellerContact')]
        protected ?ContactType $sellerContact = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getCustomerAssignedAccountID(): ?IdentifierType
    {
        return $this->customerAssignedAccountID;
    }

    public function setCustomerAssignedAccountID(?IdentifierType $customerAssignedAccountID): void
    {
        $this->customerAssignedAccountID = $customerAssignedAccountID;
    }

    /**
     * @return IdentifierType[]
     */
    public function getAdditionalAccountIDs(): array
    {
        return $this->additionalAccountIDs;
    }

    /**
     * @param IdentifierType[] $additionalAccountIDs
     * @return void
     */
    public function setAdditionalAccountIDs(array $additionalAccountIDs): void
    {
        $this->additionalAccountIDs = [];
        foreach ($additionalAccountIDs as $additionalAccountID) {
            $this->addAdditionalAccountID($additionalAccountID);
        }
    }

    public function addAdditionalAccountID(?IdentifierType $id = null): IdentifierType
    {
        return $this->additionalAccountIDs []= $id ?? new IdentifierType;
    }

    public function getDataSendingCapability(): ?TextType
    {
        return $this->dataSendingCapability;
    }

    public function setDataSendingCapability(?TextType $dataSendingCapability): void
    {
        $this->dataSendingCapability = $dataSendingCapability;
    }

    public function getParty(): ?PartyType
    {
        return $this->party;
    }

    public function setParty(?PartyType $party): void
    {
        $this->party = $party;
    }

    public function getDespatchContact(): ?ContactType
    {
        return $this->despatchContact;
    }

    public function setDespatchContact(?ContactType $despatchContact): void
    {
        $this->despatchContact = $despatchContact;
    }

    public function getAccountingContact(): ?ContactType
    {
        return $this->accountingContact;
    }

    public function setAccountingContact(?ContactType $accountingContact): void
    {
        $this->accountingContact = $accountingContact;
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