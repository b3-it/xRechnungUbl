<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use UBL\UnqualifiedDataTypes\AmountType;

class MonetaryTotalType
{
    public function __construct(
        #[Assert\NotNull(message: '[BR-12]-An Invoice shall have the Sum of Invoice line net amount (BT-106).')]
        #[SerializedName('LineExtensionAmount')]
        protected ?AmountType $lineExtensionAmount = null,
        #[Assert\NotNull(message: '[BR-13]-An Invoice shall have the Invoice total amount without VAT (BT-109).')]
        #[SerializedName('TaxExclusiveAmount')]
        protected ?AmountType $taxExclusiveAmount = null,
        #[Assert\NotNull(message: '[BR-14]-An Invoice shall have the Invoice total amount with VAT (BT-112).')]
        #[SerializedName('TaxInclusiveAmount')]
        protected ?AmountType $taxInclusiveAmount = null,
        #[SerializedName('AllowanceTotalAmount')]
        protected ?AmountType $allowanceTotalAmount = null,
        #[SerializedName('ChargeTotalAmount')]
        protected ?AmountType $chargeTotalAmount = null,
        #[SerializedName('PrepaidAmount')]
        protected ?AmountType $prepaidAmount = null,
        #[SerializedName('PayableRoundingAmount')]
        protected ?AmountType $payableRoundingAmount = null,
        #[Assert\NotNull(message: '[BR-15]-An Invoice shall have the Amount due for payment (BT-115).')]
        #[SerializedName('PayableAmount')]
        protected ?AmountType $payableAmount = null,
        #[SerializedName('PayableAlternativeAmount')]
        protected ?AmountType $payableAlternativeAmount = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getLineExtensionAmount(): ?AmountType
    {
        return $this->lineExtensionAmount;
    }

    public function setLineExtensionAmount(?AmountType $lineExtensionAmount): void
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
    }

    public function getTaxExclusiveAmount(): ?AmountType
    {
        return $this->taxExclusiveAmount;
    }

    public function setTaxExclusiveAmount(?AmountType $taxExclusiveAmount): void
    {
        $this->taxExclusiveAmount = $taxExclusiveAmount;
    }

    public function getTaxInclusiveAmount(): ?AmountType
    {
        return $this->taxInclusiveAmount;
    }

    public function setTaxInclusiveAmount(?AmountType $taxInclusiveAmount): void
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount;
    }

    public function getAllowanceTotalAmount(): ?AmountType
    {
        return $this->allowanceTotalAmount;
    }

    public function setAllowanceTotalAmount(?AmountType $allowanceTotalAmount): void
    {
        $this->allowanceTotalAmount = $allowanceTotalAmount;
    }

    public function getChargeTotalAmount(): ?AmountType
    {
        return $this->chargeTotalAmount;
    }

    public function setChargeTotalAmount(?AmountType $chargeTotalAmount): void
    {
        $this->chargeTotalAmount = $chargeTotalAmount;
    }

    public function getPrepaidAmount(): ?AmountType
    {
        return $this->prepaidAmount;
    }

    public function setPrepaidAmount(?AmountType $prepaidAmount): void
    {
        $this->prepaidAmount = $prepaidAmount;
    }

    public function getPayableRoundingAmount(): ?AmountType
    {
        return $this->payableRoundingAmount;
    }

    public function setPayableRoundingAmount(?AmountType $payableRoundingAmount): void
    {
        $this->payableRoundingAmount = $payableRoundingAmount;
    }

    public function getPayableAmount(): ?AmountType
    {
        return $this->payableAmount;
    }

    public function setPayableAmount(?AmountType $payableAmount): void
    {
        $this->payableAmount = $payableAmount;
    }

    public function getPayableAlternativeAmount(): ?AmountType
    {
        return $this->payableAlternativeAmount;
    }

    public function setPayableAlternativeAmount(?AmountType $payableAlternativeAmount): void
    {
        $this->payableAlternativeAmount = $payableAlternativeAmount;
    }
}