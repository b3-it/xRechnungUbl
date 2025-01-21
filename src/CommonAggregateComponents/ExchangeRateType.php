<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use UBL\CommonAggregateComponents;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\RateType;

class ExchangeRateType
{

    public function __construct(
        #[SerializedName('SourceCurrencyCode')]
        protected ?CodeType $sourceCurrencyCode = null,
        #[SerializedName('SourceCurrencyBaseRate')]
        protected ?RateType $sourceCurrencyBaseRate = null,
        #[SerializedName('TargetCurrencyCode')]
        protected ?CodeType $targetCurrencyCode = null,
        #[SerializedName('TargetCurrencyBaseRate')]
        protected ?RateType $targetCurrencyBaseRate = null,
        #[SerializedName('ExchangeMarketID')]
        protected ?IdentifierType $exchangeMarketID = null,
        #[SerializedName('CalculationRate')]
        protected ?RateType $calculationRate = null,
        #[SerializedName('MathematicOperatorCode')]
        protected ?CodeType $mathematicOperatorCode = null,
        #[SerializedName('Date')]
        #[Context([DateTimeNormalizer::FORMAT_KEY => CommonAggregateComponents::DATE_FORMAT])]
        protected ?DateTimeInterface $date = null,
        #[SerializedName('ForeignExchangeContract')]
        protected ?ContractType $foreignExchangeContract = null
    )
    {
    }

    public function getSourceCurrencyCode(): ?CodeType
    {
        return $this->sourceCurrencyCode;
    }

    public function setSourceCurrencyCode(?CodeType $sourceCurrencyCode): void
    {
        $this->sourceCurrencyCode = $sourceCurrencyCode;
    }

    public function getSourceCurrencyBaseRate(): ?RateType
    {
        return $this->sourceCurrencyBaseRate;
    }

    public function setSourceCurrencyBaseRate(?RateType $sourceCurrencyBaseRate): void
    {
        $this->sourceCurrencyBaseRate = $sourceCurrencyBaseRate;
    }

    public function getTargetCurrencyCode(): ?CodeType
    {
        return $this->targetCurrencyCode;
    }

    public function setTargetCurrencyCode(?CodeType $targetCurrencyCode): void
    {
        $this->targetCurrencyCode = $targetCurrencyCode;
    }

    public function getTargetCurrencyBaseRate(): ?RateType
    {
        return $this->targetCurrencyBaseRate;
    }

    public function setTargetCurrencyBaseRate(?RateType $targetCurrencyBaseRate): void
    {
        $this->targetCurrencyBaseRate = $targetCurrencyBaseRate;
    }

    public function getExchangeMarketID(): ?IdentifierType
    {
        return $this->exchangeMarketID;
    }

    public function setExchangeMarketID(?IdentifierType $exchangeMarketID): void
    {
        $this->exchangeMarketID = $exchangeMarketID;
    }

    public function getCalculationRate(): ?RateType
    {
        return $this->calculationRate;
    }

    public function setCalculationRate(?RateType $calculationRate): void
    {
        $this->calculationRate = $calculationRate;
    }

    public function getMathematicOperatorCode(): ?CodeType
    {
        return $this->mathematicOperatorCode;
    }

    public function setMathematicOperatorCode(?CodeType $mathematicOperatorCode): void
    {
        $this->mathematicOperatorCode = $mathematicOperatorCode;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    public function getForeignExchangeContract(): ?ContractType
    {
        return $this->foreignExchangeContract;
    }

    public function setForeignExchangeContract(?ContractType $foreignExchangeContract): void
    {
        $this->foreignExchangeContract = $foreignExchangeContract;
    }
}