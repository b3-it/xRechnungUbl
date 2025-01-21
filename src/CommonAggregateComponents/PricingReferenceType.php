<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PricingReferenceType
{
    /**
     * @param PriceType[] $alternativeConditionPrices
     */
    public function __construct(
        #[SerializedName('OriginalItemLocationQuantity')]
        protected ?ItemLocationQuantityType $originalItemLocationQuantity = null,
        #[SerializedName('AlternativeConditionPrice')]
        protected array $alternativeConditionPrices = []
    )
    {
    }

    public function getOriginalItemLocationQuantity(): ?ItemLocationQuantityType
    {
        return $this->originalItemLocationQuantity;
    }

    public function setOriginalItemLocationQuantity(?ItemLocationQuantityType $originalItemLocationQuantity): void
    {
        $this->originalItemLocationQuantity = $originalItemLocationQuantity;
    }

    /**
     * @return PriceType[]
     */
    public function getAlternativeConditionPrices(): array
    {
        return $this->alternativeConditionPrices;
    }

    /**
     * @param PriceType[] $alternativeConditionPrices
     * @return void
     */
    public function setAlternativeConditionPrices(array $alternativeConditionPrices): void
    {
        $this->alternativeConditionPrices = [];
        foreach ($alternativeConditionPrices as $alternativeConditionPrice) {
            $this->addAlternativeConditionPrice($alternativeConditionPrice);
        }
    }
    public function addAlternativeConditionPrice(PriceType $alternativeConditionPrice): void
    {
        $this->alternativeConditionPrices []= $alternativeConditionPrice;
    }
}