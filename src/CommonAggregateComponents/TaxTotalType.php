<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\Indicator;

class TaxTotalType
{


    /**
     * @param TaxSubtotalType[] $taxSubtotals
     */
    public function __construct(
        #[SerializedName('TaxAmount')]
        protected ?AmountType $taxAmount = null,
        #[SerializedName('RoundingAmount')]
        protected ?AmountType $roundingAmount = null,
        #[SerializedName('TaxEvidenceIndicator')]
        protected ?Indicator $taxEvidenceIndicator = null,
        #[SerializedName('TaxIncludedIndicator')]
        protected ?Indicator $taxIncludedIndicator = null,
        #[SerializedName('TaxSubtotal')]
        protected array $taxSubtotals = []
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getTaxAmount(): ?AmountType
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(?AmountType $taxAmount): void
    {
        $this->taxAmount = $taxAmount;
    }

    public function getRoundingAmount(): ?AmountType
    {
        return $this->roundingAmount;
    }

    public function setRoundingAmount(?AmountType $roundingAmount): void
    {
        $this->roundingAmount = $roundingAmount;
    }

    public function getTaxEvidenceIndicator(): ?Indicator
    {
        return $this->taxEvidenceIndicator;
    }

    public function setTaxEvidenceIndicator(?Indicator $taxEvidenceIndicator): void
    {
        $this->taxEvidenceIndicator = $taxEvidenceIndicator;
    }

    public function getTaxIncludedIndicator(): ?Indicator
    {
        return $this->taxIncludedIndicator;
    }

    public function setTaxIncludedIndicator(?Indicator $taxIncludedIndicator): void
    {
        $this->taxIncludedIndicator = $taxIncludedIndicator;
    }

    /**
     * @return TaxSubtotalType[]
     */
    public function getTaxSubtotals(): array
    {
        return $this->taxSubtotals;
    }

    /**
     * @param TaxSubtotalType[] $taxSubtotals
     */
    public function setTaxSubtotals(array $taxSubtotals): void
    {
        $this->taxSubtotals = $taxSubtotals;
    }

    public function addTaxSubtotal(): TaxSubtotalType
    {
        return $this->taxSubtotals []= new TaxSubtotalType();
    }
}