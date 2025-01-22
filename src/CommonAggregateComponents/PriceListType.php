<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;

class PriceListType
{

    /**
     * @param PeriodType[] $validityPeriods
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('StatusCode')]
        protected ?CodeType $statusCode = null,
        #[SerializedName('ValidityPeriod')]
        protected array $validityPeriods = [],
        #[SerializedName('PreviousPriceList')]
        protected ?PriceListType $previousPriceList = null
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    public function getStatusCode(): ?CodeType
    {
        return $this->statusCode;
    }

    public function setStatusCode(?CodeType $statusCode): void
    {
        $this->statusCode = $statusCode;
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

    public function addValidityPeriod(?PeriodType $validityPeriod = null): PeriodType
    {
        return $this->validityPeriods []= $validityPeriod ?? new PeriodType;
    }

    public function getPreviousPriceList(): ?PriceListType
    {
        return $this->previousPriceList;
    }

    public function setPreviousPriceList(?PriceListType $previousPriceList): void
    {
        $this->previousPriceList = $previousPriceList;
    }
}