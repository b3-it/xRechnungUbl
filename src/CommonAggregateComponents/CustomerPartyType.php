<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;

class CustomerPartyType
{


    /**
     * @param IdentifierType[] $additionalAccountIDs
     */
    public function __construct(
        #[SerializedName('CustomerAssignedAccountID')]
        protected ?IdentifierType $customerAssignedAccountID = null,
        #[SerializedName('SupplierAssignedAccountID')]
        protected ?IdentifierType $supplierAssignedAccountID = null,
        #[SerializedName('AdditionalAccountID')]
        protected array $additionalAccountIDs = [],
        #[SerializedName('Party')]
        protected ?PartyType $party = null,
        #[SerializedName('DeliveryContact')]
        protected ?ContactType $deliveryContact = null,
        #[SerializedName('AccountingContact')]
        protected ?ContactType $accountingContact = null,
        #[SerializedName('BuyerContact')]
        protected ?ContactType $buyerContact = null
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

    public function getSupplierAssignedAccountID(): ?IdentifierType
    {
        return $this->supplierAssignedAccountID;
    }

    public function setSupplierAssignedAccountID(?IdentifierType $supplierAssignedAccountID): void
    {
        $this->supplierAssignedAccountID = $supplierAssignedAccountID;
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

    public function addAdditionalAccountID(IdentifierType $additionalAccountID): void
    {
        $this->additionalAccountIDs []= $additionalAccountID;
    }

    public function getParty(): ?PartyType
    {
        return $this->party;
    }

    public function setParty(?PartyType $party): void
    {
        $this->party = $party;
    }

    public function getDeliveryContact(): ?ContactType
    {
        return $this->deliveryContact;
    }

    public function setDeliveryContact(?ContactType $deliveryContact): void
    {
        $this->deliveryContact = $deliveryContact;
    }

    public function getAccountingContact(): ?ContactType
    {
        return $this->accountingContact;
    }

    public function setAccountingContact(?ContactType $accountingContact): void
    {
        $this->accountingContact = $accountingContact;
    }

    public function getBuyerContact(): ?ContactType
    {
        return $this->buyerContact;
    }

    public function setBuyerContact(?ContactType $buyerContact): void
    {
        $this->buyerContact = $buyerContact;
    }
}