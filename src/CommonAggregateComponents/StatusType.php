<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\PercentType;
use UBL\UnqualifiedDataTypes\TextType;


class StatusType
{
    /**
     * @param TextType[] $descriptions
     * @param TextType[] $texts
     * @param ConditionType[] $conditions
     */
    public function __construct(
        #[SerializedName('ConditionCode')]
        protected ?CodeType $conditionCode = null,
        #[SerializedName('ReferenceDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $ReferenceDate = null,
        #[SerializedName('ReferenceTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $ReferenceTime = null,
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('StatusReasonCode')]
        protected ?CodeType $statusReasonCode = null,
        #[SerializedName('StatusReason')]
        protected array $statusReasons = [],
        #[SerializedName('SequenceID')]
        protected ?IdentifierType $sequenceID = null,
        #[SerializedName('Text')]
        protected array $texts = [],
        #[SerializedName('IndicationIndicator')]
        protected ?Indicator $indicationIndicator = null,
        #[SerializedName('Percent')]
        protected ?PercentType $percent = null,
        #[SerializedName('ReliabilityPercent')]
        protected ?PercentType $reliabilityPercent = null,
        #[SerializedName('Condition')]
        protected array $conditions = [],
    )
    {
    }

    public function getConditionCode(): ?CodeType
    {
        return $this->conditionCode;
    }

    public function setConditionCode(?CodeType $conditionCode): void
    {
        $this->conditionCode = $conditionCode;
    }

    public function getReferenceDate(): ?DateTimeInterface
    {
        return $this->ReferenceDate;
    }

    public function setReferenceDate(?DateTimeInterface $ReferenceDate): void
    {
        $this->ReferenceDate = $ReferenceDate;
    }

    public function getReferenceTime(): ?DateTimeInterface
    {
        return $this->ReferenceTime;
    }

    public function setReferenceTime(?DateTimeInterface $ReferenceTime): void
    {
        $this->ReferenceTime = $ReferenceTime;
    }

    /**
     * @return TextType[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param TextType[] $descriptions
     * @return void
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = $descriptions;
    }

    public function getStatusReasonCode(): ?CodeType
    {
        return $this->statusReasonCode;
    }

    public function setStatusReasonCode(?CodeType $statusReasonCode): void
    {
        $this->statusReasonCode = $statusReasonCode;
    }

    public function getStatusReasons(): array
    {
        return $this->statusReasons;
    }

    public function setStatusReasons(array $statusReasons): void
    {
        $this->statusReasons = $statusReasons;
    }

    public function getSequenceID(): ?IdentifierType
    {
        return $this->sequenceID;
    }

    public function setSequenceID(?IdentifierType $sequenceID): void
    {
        $this->sequenceID = $sequenceID;
    }

    /**
     * @return TextType[]
     */
    public function getTexts(): array
    {
        return $this->texts;
    }

    /**
     * @param TextType[] $texts
     * @return void
     */
    public function setTexts(array $texts): void
    {
        $this->texts = $texts;
    }

    public function getIndicationIndicator(): ?Indicator
    {
        return $this->indicationIndicator;
    }

    public function setIndicationIndicator(?Indicator $indicationIndicator): void
    {
        $this->indicationIndicator = $indicationIndicator;
    }

    public function getPercent(): ?PercentType
    {
        return $this->percent;
    }

    public function setPercent(?PercentType $percent): void
    {
        $this->percent = $percent;
    }

    public function getReliabilityPercent(): ?PercentType
    {
        return $this->reliabilityPercent;
    }

    public function setReliabilityPercent(?PercentType $reliabilityPercent): void
    {
        $this->reliabilityPercent = $reliabilityPercent;
    }

    /**
     * @return ConditionType[]
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * @param ConditionType[] $conditions
     * @return void
     */
    public function setConditions(array $conditions): void
    {
        $this->conditions = $conditions;
    }
}