<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class ItemLocationQuantityType
{
    /**
     * @param TextType[] $tradingRestrictions
     * @param AddressType[] $applicableTerritoryAddresses
     * @param DeliveryUnitType[] $deliveryUnits
     * @param TaxCategoryType[] $applicableTaxCategories
     * @param AllowanceChargeType[] $allowanceCharges
     */
    public function __construct(
        #[SerializedName('LeadTimeMeasure')]
        protected ?MeasureType $leadTimeMeasure = null,
        #[SerializedName('MinimumQuantity')]
        protected ?QuantityType $minimumQuantity = null,
        #[SerializedName('MaximumQuantity')]
        protected ?QuantityType $maximumQuantity = null,
        #[SerializedName('HazardousRiskIndicator')]
        protected ?Indicator $hazardousRiskIndicator = null,
        #[SerializedName('TradingRestrictions')]
        protected array $tradingRestrictions = [],
        #[SerializedName('ApplicableTerritoryAddress')]
        protected array $applicableTerritoryAddresses = [],
        #[SerializedName('Price')]
        protected ?PriceType $price = null,
        #[SerializedName('DeliveryUnit')]
        protected array $deliveryUnits = [],
        #[SerializedName('ApplicableTaxCategory')]
        protected array $applicableTaxCategories = [],
        #[SerializedName('Package')]
        protected ?PackageType $package = null,
        #[SerializedName('AllowanceCharge')]
        protected array $allowanceCharges = [],
        #[SerializedName('DependentPriceReference')]
        protected ?DependentPriceReferenceType $dependentPriceReference = null,
    )
    {
    }

    public function getLeadTimeMeasure(): ?MeasureType
    {
        return $this->leadTimeMeasure;
    }

    public function setLeadTimeMeasure(?MeasureType $leadTimeMeasure): void
    {
        $this->leadTimeMeasure = $leadTimeMeasure;
    }

    public function getMinimumQuantity(): ?QuantityType
    {
        return $this->minimumQuantity;
    }

    public function setMinimumQuantity(?QuantityType $minimumQuantity): void
    {
        $this->minimumQuantity = $minimumQuantity;
    }

    public function getMaximumQuantity(): ?QuantityType
    {
        return $this->maximumQuantity;
    }

    public function setMaximumQuantity(?QuantityType $maximumQuantity): void
    {
        $this->maximumQuantity = $maximumQuantity;
    }

    public function getHazardousRiskIndicator(): ?Indicator
    {
        return $this->hazardousRiskIndicator;
    }

    public function setHazardousRiskIndicator(?Indicator $hazardousRiskIndicator): void
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;
    }

    /**
     * @return TextType[]
     */
    public function getTradingRestrictions(): array
    {
        return $this->tradingRestrictions;
    }

    /**
     * @param TextType[] $tradingRestrictions
     * @return void
     */
    public function setTradingRestrictions(array $tradingRestrictions): void
    {
        $this->tradingRestrictions = $tradingRestrictions;
    }

    /**
     * @return AddressType[]
     */
    public function getApplicableTerritoryAddresses(): array
    {
        return $this->applicableTerritoryAddresses;
    }

    /**
     * @param AddressType[] $applicableTerritoryAddresses
     * @return void
     */
    public function setApplicableTerritoryAddresses(array $applicableTerritoryAddresses): void
    {
        $this->applicableTerritoryAddresses = $applicableTerritoryAddresses;
    }

    public function getPrice(): ?PriceType
    {
        return $this->price;
    }

    public function setPrice(?PriceType $price): void
    {
        $this->price = $price;
    }

    /**
     * @return DeliveryUnitType[]
     */
    public function getDeliveryUnits(): array
    {
        return $this->deliveryUnits;
    }

    /**
     * @param DeliveryUnitType[] $deliveryUnits
     * @return void
     */
    public function setDeliveryUnits(array $deliveryUnits): void
    {
        $this->deliveryUnits = $deliveryUnits;
    }

    /**
     * @return TaxCategoryType[]
     */
    public function getApplicableTaxCategories(): array
    {
        return $this->applicableTaxCategories;
    }

    /**
     * @param TaxCategoryType[] $applicableTaxCategories
     * @return void
     */
    public function setApplicableTaxCategories(array $applicableTaxCategories): void
    {
        $this->applicableTaxCategories = $applicableTaxCategories;
    }

    public function getPackage(): ?PackageType
    {
        return $this->package;
    }

    public function setPackage(?PackageType $package): void
    {
        $this->package = $package;
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
        $this->allowanceCharges = $allowanceCharges;
    }

    public function getDependentPriceReference(): ?DependentPriceReferenceType
    {
        return $this->dependentPriceReference;
    }

    public function setDependentPriceReference(?DependentPriceReferenceType $dependentPriceReference): void
    {
        $this->dependentPriceReference = $dependentPriceReference;
    }
}