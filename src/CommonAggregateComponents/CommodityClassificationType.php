<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;

class CommodityClassificationType
{

    public function __construct(
        #[SerializedName('NatureCode')]
        protected ?CodeType $natureCode = null,
        #[SerializedName('CargoTypeCode')]
        protected ?CodeType $cargoTypeCode = null,
        #[SerializedName('CommodityCode')]
        protected ?CodeType $commodityCode = null,
        #[SerializedName('ItemClassificationCode')]
        protected ?CodeType $itemClassificationCode = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getNatureCode(): ?CodeType
    {
        return $this->natureCode;
    }

    public function setNatureCode(?CodeType $natureCode): void
    {
        $this->natureCode = $natureCode;
    }

    public function getCargoTypeCode(): ?CodeType
    {
        return $this->cargoTypeCode;
    }

    public function setCargoTypeCode(?CodeType $cargoTypeCode): void
    {
        $this->cargoTypeCode = $cargoTypeCode;
    }

    public function getCommodityCode(): ?CodeType
    {
        return $this->commodityCode;
    }

    public function setCommodityCode(?CodeType $commodityCode): void
    {
        $this->commodityCode = $commodityCode;
    }

    public function getItemClassificationCode(): ?CodeType
    {
        return $this->itemClassificationCode;
    }

    public function setItemClassificationCode(?CodeType $itemClassificationCode): void
    {
        $this->itemClassificationCode = $itemClassificationCode;
    }

}