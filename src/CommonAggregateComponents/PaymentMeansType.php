<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class PaymentMeansType
{
    /**
     * @param TextType[] $instructionNotes
     * @param IdentifierType[] $paymentIDs
     */
    public function __construct(

        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('PaymentMeansCode')]
        protected ?CodeType $paymentMeansCode = null,
        #[SerializedName('PaymentDueDate')]
        protected ?DateTimeInterface $paymentDueDate = null,
        #[SerializedName('PaymentChannelCode')]
        protected ?CodeType $paymentChannelCode = null,
        #[SerializedName('InstructionID')]
        protected ?IdentifierType $instructionID = null,

        /**
         * @var TextType[]
         */
        #[SerializedName('InstructionNote')]
        protected array $instructionNotes = [],

        /**
         * @var IdentifierType[]
         */
        #[SerializedName('PaymentID')]
        protected array $paymentIDs = [],

        #[SerializedName('CardAccount')]
        protected ?CardAccountType $cardAccount = null,
        #[SerializedName('PayerFinancialAccount')]
        protected ?FinancialAccountType $payerFinancialAccount = null,
        #[SerializedName('PayeeFinancialAccount')]
        protected ?FinancialAccountType $payeeFinancialAccount = null,
        #[SerializedName('CreditAccount')]
        protected ?CreditAccountType $creditAccount = null,
        #[SerializedName('PaymentMandate')]
        protected ?PaymentMandateType $paymentMandate = null,
        #[SerializedName('TradeFinancing')]
        protected ?TradeFinancingType $tradeFinancing = null
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

    public function getPaymentMeansCode(): ?CodeType
    {
        return $this->paymentMeansCode;
    }

    public function setPaymentMeansCode(?CodeType $paymentMeansCode): void
    {
        $this->paymentMeansCode = $paymentMeansCode;
    }

    public function getPaymentDueDate(): ?DateTimeInterface
    {
        return $this->paymentDueDate;
    }

    public function setPaymentDueDate(?DateTimeInterface $paymentDueDate): void
    {
        $this->paymentDueDate = $paymentDueDate;
    }

    public function getPaymentChannelCode(): ?CodeType
    {
        return $this->paymentChannelCode;
    }

    public function setPaymentChannelCode(?CodeType $paymentChannelCode): void
    {
        $this->paymentChannelCode = $paymentChannelCode;
    }

    public function getInstructionID(): ?IdentifierType
    {
        return $this->instructionID;
    }

    public function setInstructionID(?IdentifierType $instructionID): void
    {
        $this->instructionID = $instructionID;
    }

    /**
     * @return TextType[]
     */
    public function getInstructionNotes(): array
    {
        return $this->instructionNotes;
    }

    /**
     * @param TextType[] $instructionNotes
     * @return void
     */
    public function setInstructionNotes(array $instructionNotes): void
    {
        $this->instructionNotes = [];
        foreach ($instructionNotes as $instructionNote) {
            $this->addInstructionNote($instructionNote);
        }
    }

    public function addInstructionNote(TextType $instructionNote): void
    {
        $this->instructionNotes []= $instructionNote;
    }

    /**
     * @return IdentifierType[]
     */
    public function getPaymentIDs(): array
    {
        return $this->paymentIDs;
    }

    /**
     * @param IdentifierType[] $paymentIDs
     * @return void
     */
    public function setPaymentIDs(array $paymentIDs): void
    {
        $this->paymentIDs = [];
        foreach ($paymentIDs as $paymentID) {
            $this->addPaymentID($paymentID);
        }
    }

    public function addPaymentID(IdentifierType $paymentID): void
    {
        $this->paymentIDs []= $paymentID;
    }

    public function getCardAccount(): ?CardAccountType
    {
        return $this->cardAccount;
    }

    public function setCardAccount(?CardAccountType $cardAccount): void
    {
        $this->cardAccount = $cardAccount;
    }

    public function getPayerFinancialAccount(): ?FinancialAccountType
    {
        return $this->payerFinancialAccount;
    }

    public function setPayerFinancialAccount(?FinancialAccountType $payerFinancialAccount): void
    {
        $this->payerFinancialAccount = $payerFinancialAccount;
    }

    public function getPayeeFinancialAccount(): ?FinancialAccountType
    {
        return $this->payeeFinancialAccount;
    }

    public function setPayeeFinancialAccount(?FinancialAccountType $payeeFinancialAccount): void
    {
        $this->payeeFinancialAccount = $payeeFinancialAccount;
    }

    public function getCreditAccount(): ?CreditAccountType
    {
        return $this->creditAccount;
    }

    public function setCreditAccount(?CreditAccountType $creditAccount): void
    {
        $this->creditAccount = $creditAccount;
    }

    public function getPaymentMandate(): ?PaymentMandateType
    {
        return $this->paymentMandate;
    }

    public function setPaymentMandate(?PaymentMandateType $paymentMandate): void
    {
        $this->paymentMandate = $paymentMandate;
    }

    public function getTradeFinancing(): ?TradeFinancingType
    {
        return $this->tradeFinancing;
    }

    public function setTradeFinancing(?TradeFinancingType $tradeFinancing): void
    {
        $this->tradeFinancing = $tradeFinancing;
    }
}