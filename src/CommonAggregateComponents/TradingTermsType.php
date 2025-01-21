<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\TextType;

class TradingTermsType
{
    /**
     * @param TextType[] $information
     */
    public function __construct(
        #[SerializedName('Information')]
        protected array $information = [],
        #[SerializedName('Reference')]
        protected ?TextType $reference = null,
        #[SerializedName('ApplicableAddress')]
        protected ?AddressType $applicableAddress = null
    )
    {
    }

    /**
     * @return TextType[]
     */
    public function getInformation(): array
    {
        return $this->information;
    }

    /**
     * @param TextType[] $information
     * @return void
     */
    public function setInformation(array $information): void
    {
        $this->information = $information;
    }

    public function getReference(): ?TextType
    {
        return $this->reference;
    }

    public function setReference(?TextType $reference): void
    {
        $this->reference = $reference;
    }

    public function getApplicableAddress(): ?AddressType
    {
        return $this->applicableAddress;
    }

    public function setApplicableAddress(?AddressType $applicableAddress): void
    {
        $this->applicableAddress = $applicableAddress;
    }
}