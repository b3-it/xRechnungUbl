<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\TextType;

class ItemPropertyRangeType
{

    public function __construct(
        #[SerializedName('MinimumValue')]
        protected ?TextType $minimumValue = null,
        #[SerializedName('MaximumValue')]
        protected ?TextType $maximumValue = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getMinimumValue(): ?TextType
    {
        return $this->minimumValue;
    }

    public function setMinimumValue(?TextType $minimumValue): void
    {
        $this->minimumValue = $minimumValue;
    }

    public function getMaximumValue(): ?TextType
    {
        return $this->maximumValue;
    }

    public function setMaximumValue(?TextType $maximumValue): void
    {
        $this->maximumValue = $maximumValue;
    }
}