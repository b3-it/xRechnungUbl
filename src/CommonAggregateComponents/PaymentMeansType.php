<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use UBL\Peppol\PaymentMeansCode;
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
        #[Assert\NotNull(message: '[BR-49]-A Payment instruction (BG-16) shall specify the Payment means type code (BT-81).')]
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
        #[Assert\Count(max: 1, maxMessage: '[UBL-SR-26]-Payment reference shall occur maximum once')]
        #[SerializedName('PaymentID')]
        protected array $paymentIDs = [],

        #[SerializedName('CardAccount')]
        protected ?CardAccountType $cardAccount = null,
        #[SerializedName('PayerFinancialAccount')]
        protected ?FinancialAccountType $payerFinancialAccount = null,
        #[Assert\When(
            'this.getPaymentMeansCode().value == 30 or this.getPaymentMeansCode().value == 36', [
                new Assert\NotNull( message: '[BR-61]-If the Payment means type code (BT-81) means SEPA credit transfer, Local credit transfer or Non-SEPA international credit transfer, the Payment account identifier (BT-84) shall be present.')
            ]
        )]
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

    public function addInstructionNote(?TextType $instructionNote = null): TextType
    {
        return $this->instructionNotes []= $instructionNote ?? new TextType;
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

    public function addPaymentID(?IdentifierType $paymentID = null): IdentifierType
    {
        return $this->paymentIDs []= $paymentID ?? new IdentifierType;
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

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
    }
}