<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\TextType;

class PeriodType
{


    /**
     * @param CodeType[] $descriptionCodes
     * @param TextType[] $descriptions
     */
    public function __construct(
        #[SerializedName('StartDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $startDate = null,
        #[SerializedName('StartTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $startTime = null,
        #[SerializedName('EndDate')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $endDate = null,
        #[SerializedName('EndTime')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::TIME_FORMAT])]
        protected ?DateTimeInterface $endTime = null,
        #[SerializedName('DurationMeasure')]
        protected ?MeasureType $durationMeasure = null,
        #[SerializedName('DescriptionCode')]
        protected array $descriptionCodes = [],
        #[SerializedName('Description')]
        protected array $descriptions = [],
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }
    public function setStartDate(DateTimeInterface $date, $time = false): static
    {
        $this->startDate = $date;
        if ($time) {
            $this->setStartTime($date);
        }
        return $this;
    }

    public function getStartTime(): ?DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(DateTimeInterface $date): static
    {
        $this->startTime = $date;
        return $this;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }
    public function setEndDate(DateTimeInterface $date, $time = false): static
    {
        $this->endDate = $date;
        if ($time) {
            $this->setEndTime($date);
        }
        return $this;
    }

    public function getEndTime(): ?DateTimeInterface
    {
        return $this->endTime;
    }
    public function setEndTime(DateTimeInterface $date): static
    {
        $this->endTime = $date;
        return $this;
    }

    /**
     * @return CodeType[]
     */
    public function getDescriptionCodes(): array
    {
        return $this->descriptionCodes;
    }

    /**
     * @param CodeType[] $descriptionCodes
     */
    public function setDescriptionCodes(array $descriptionCodes): void
    {
        $this->descriptionCodes = $descriptionCodes;
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
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = $descriptions;
    }
}