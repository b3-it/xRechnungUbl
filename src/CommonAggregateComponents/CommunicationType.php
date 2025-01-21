<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\TextType;

class CommunicationType
{
    public function __construct(
        #[SerializedName('ChannelCode')]
        protected ?CodeType $channelCode = null,
        #[SerializedName('Channel')]
        protected ?TextType $channel = null,
        #[SerializedName('Value')]
        protected ?TextType $value = null
    ) {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getChannelCode(): ?CodeType
    {
        return $this->channelCode;
    }

    public function setChannelCode(?CodeType $channelCode): void
    {
        $this->channelCode = $channelCode;
    }

    public function getChannel(): ?TextType
    {
        return $this->channel;
    }

    public function setChannel(?TextType $channel): void
    {
        $this->channel = $channel;
    }

    public function getValue(): ?TextType
    {
        return $this->value;
    }

    public function setValue(?TextType $value): void
    {
        $this->value = $value;
    }
}