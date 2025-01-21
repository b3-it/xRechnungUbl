<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\RateType;
use UBL\UnqualifiedDataTypes\TextType;

class PriceType
{
    /**
     * @param TextType[] $priceChangeReasons
     * @param PeriodType[] $validityPeriods
     * @param AllowanceChargeType[] $allowanceCharges
     */
    public function __construct(
        #[SerializedName('PriceAmount')]
        protected ?AmountType $priceAmount = null,
        #[SerializedName('BaseQuantity')]
        protected ?QuantityType $baseQuantity = null,
        #[SerializedName('PriceChangeReason')]
        protected array $priceChangeReasons = [],
        #[SerializedName('PriceTypeCode')]
        protected ?CodeType $priceTypeCode = null,
        #[SerializedName('PriceType')]
        protected ?TextType $priceType = null,
        #[SerializedName('OrderableUnitFactorRate')]
        protected ?RateType $orderableUnitFactorRate = null,
        #[SerializedName('ValidityPeriod')]
        protected array $validityPeriods = [],
        #[SerializedName('PriceList')]
        protected ?PriceListType $priceList = null,
        #[SerializedName('AllowanceCharge')]
        protected array $allowanceCharges = [],
        #[SerializedName('PricingExchangeRate')]
        protected ?ExchangeRateType $pricingExchangeRate = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getPriceAmount(): ?AmountType
    {
        return $this->priceAmount;
    }

    public function setPriceAmount(?AmountType $priceAmount): void
    {
        $this->priceAmount = $priceAmount;
    }

    public function getBaseQuantity(): ?QuantityType
    {
        return $this->baseQuantity;
    }

    public function setBaseQuantity(?QuantityType $baseQuantity): void
    {
        $this->baseQuantity = $baseQuantity;
    }

    /**
     * @return TextType[]
     */
    public function getPriceChangeReasons(): array
    {
        return $this->priceChangeReasons;
    }

    /**
     * @param TextType[] $priceChangeReasons
     * @return void
     */
    public function setPriceChangeReasons(array $priceChangeReasons): void
    {
        $this->priceChangeReasons = [];
        foreach ($priceChangeReasons as $priceChangeReason) {
            $this->addPriceChangeReason($priceChangeReason);
        }
    }
    public function addPriceChangeReason(TextType $priceChangeReason): void
    {
        $this->priceChangeReasons []= $priceChangeReason;
    }

    public function getPriceTypeCode(): ?CodeType
    {
        return $this->priceTypeCode;
    }

    public function setPriceTypeCode(?CodeType $priceTypeCode): void
    {
        $this->priceTypeCode = $priceTypeCode;
    }

    public function getPriceType(): ?TextType
    {
        return $this->priceType;
    }

    public function setPriceType(?TextType $priceType): void
    {
        $this->priceType = $priceType;
    }

    public function getOrderableUnitFactorRate(): ?RateType
    {
        return $this->orderableUnitFactorRate;
    }

    public function setOrderableUnitFactorRate(?RateType $orderableUnitFactorRate): void
    {
        $this->orderableUnitFactorRate = $orderableUnitFactorRate;
    }

    /**
     * @return PeriodType[]
     */
    public function getValidityPeriods(): array
    {
        return $this->validityPeriods;
    }

    /**
     * @param PeriodType[] $validityPeriods
     * @return void
     */
    public function setValidityPeriods(array $validityPeriods): void
    {
        $this->validityPeriods = [];
        foreach ($validityPeriods as $validityPeriod) {
            $this->addValidityPeriod($validityPeriod);
        }
    }

    public function addValidityPeriod(PeriodType $validityPeriod): void
    {
        $this->validityPeriods []= $validityPeriod;
    }

    public function getPriceList(): ?PriceListType
    {
        return $this->priceList;
    }

    public function setPriceList(?PriceListType $priceList): void
    {
        $this->priceList = $priceList;
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

    public function getPricingExchangeRate(): ?ExchangeRateType
    {
        return $this->pricingExchangeRate;
    }

    public function setPricingExchangeRate(?ExchangeRateType $pricingExchangeRate): void
    {
        $this->pricingExchangeRate = $pricingExchangeRate;
    }
}