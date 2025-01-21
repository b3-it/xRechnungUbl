<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;

class PriceExtensionType
{
    /**
     * @param TaxTotalType[] $taxTotals
     */
    public function __construct(
        #[SerializedName('Amount')]
        protected ?AmountType $amount = null,
        #[SerializedName('TaxTotal')]
        protected array $taxTotals = []
    )
    {
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
     * @return TaxTotalType[]
     */
    public function getTaxTotals(): array
    {
        return $this->taxTotals;
    }

    /**
     * @param TaxTotalType[] $taxTotals
     * @return void
     */
    public function setTaxTotals(array $taxTotals): void
    {
        $this->taxTotals = [];
        foreach ($taxTotals as $taxTotal) {
            $this->addTaxTotal($taxTotal);
        }
    }

    public function addTaxTotal(TaxTotalType $taxTotal): void
    {
        $this->taxTotals []= $taxTotal;
    }

}