<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\IdentifierType;

class BillingReferenceLineType
{
    /**
     * @param AllowanceChargeType[] $allowanceCharges
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Amount')]
        protected ?AmountType $amount = null,
        #[SerializedName('AllowanceCharge')]
        protected array $allowanceCharges = []
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

    public function getAmount(): ?AmountType
    {
        return $this->amount;
    }

    public function setAmount(?AmountType $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return AllowanceChargeType[]
     */
    public function getAllowanceCharges(): array
    {
        return $this->allowanceCharges;
    }

    /**
     * @param AllowanceChargeType[] $allowanceCharges
     * @return void
     */
    public function setAllowanceCharges(array $allowanceCharges): void
    {
        $this->allowanceCharges = [];
        foreach ($allowanceCharges as $allowanceCharge) {
            $this->addAllowanceCharge($allowanceCharge);
        }
    }

    public function addAllowanceCharge(AllowanceChargeType $allowanceCharge): void
    {
        $this->allowanceCharges []= $allowanceCharge;
    }
}