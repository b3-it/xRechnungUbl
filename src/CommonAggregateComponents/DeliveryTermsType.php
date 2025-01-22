<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class DeliveryTermsType
{

    /**
     * @param TextType[] $specialTerms
     * @param TextType[] $lossRisk
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('SpecialTerms')]
        protected array $specialTerms = [],
        #[SerializedName('LossRiskResponsibilityCode')]
        protected ?CodeType $lossRiskResponsibilityCode = null,
        #[SerializedName('LossRisk')]
        protected array $lossRisk = [],
        #[SerializedName('Amount')]
        protected ?AmountType $amount = null,
        #[SerializedName('DeliveryLocation')]
        protected ?LocationType $deliveryLocation = null,
        #[SerializedName('AllowanceCharge')]
        protected ?AllowanceChargeType $allowanceCharge = null
    )
    {
    }

    public function getId(): ?IdentifierType
    {
        return $this->id;
    }

    public function setId(?IdentifierType $id): void
    {
        $this->id = $id;
    }

    /**
     * @return TextType[]
     */
    public function getSpecialTerms(): array
    {
        return $this->specialTerms;
    }

    /**
     * @param TextType[] $specialTerms
     * @return void
     */
    public function setSpecialTerms(array $specialTerms): void
    {
        $this->specialTerms = [];
        foreach ($specialTerms as $specialTerm) {
            $this->addSpecialTerm($specialTerm);
        }
    }

    public function addSpecialTerm(?TextType $specialTerm = null): TextType
    {
        return $this->specialTerms []= $specialTerm ?? new TextType;
    }

    public function getLossRiskResponsibilityCode(): ?CodeType
    {
        return $this->lossRiskResponsibilityCode;
    }

    public function setLossRiskResponsibilityCode(?CodeType $lossRiskResponsibilityCode): void
    {
        $this->lossRiskResponsibilityCode = $lossRiskResponsibilityCode;
    }

    /**
     * @return TextType[]
     */
    public function getLossRisk(): array
    {
        return $this->lossRisk;
    }

    /**
     * @param TextType[] $lossRisk
     * @return void
     */
    public function setLossRisk(array $lossRisk): void
    {
        $this->lossRisk = [];
        foreach ($lossRisk as $item) {
            $this->addLossRisk($item);
        }
    }

    public function addLossRisk(?TextType $lossRisk = null): TextType
    {
        return $this->lossRisk []= $lossRisk ?? new TextType;
    }

    public function getAmount(): ?AmountType
    {
        return $this->amount;
    }

    public function setAmount(?AmountType $amount): void
    {
        $this->amount = $amount;
    }

    public function getDeliveryLocation(): ?LocationType
    {
        return $this->deliveryLocation;
    }

    public function setDeliveryLocation(?LocationType $deliveryLocation): void
    {
        $this->deliveryLocation = $deliveryLocation;
    }

    public function getAllowanceCharge(): ?AllowanceChargeType
    {
        return $this->allowanceCharge;
    }

    public function setAllowanceCharge(?AllowanceChargeType $allowanceCharge): void
    {
        $this->allowanceCharge = $allowanceCharge;
    }


}