<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraint;
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
        #[Assert\NotNull(message: 'BR-49')]
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
        #[Assert\Count(max: 1, maxMessage: 'UBL-SR-26')]
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
        if (!$this->getPaymentMeansCode()?->value ||
            is_null(PaymentMeansCode::tryFrom($this->getPaymentMeansCode()->value))) {
            $context->buildViolation('BR-CL-16')->atPath('paymentMeansCode')->addViolation();
        }
        // UBL-SR-27 can't happen because of XML
        // UBL-SR-28 can't happen because of XML

        if ($paymentMandate = $this->getPaymentMandate()) {
            $context->getValidator()->inContext($context)->validate($paymentMandate->getPayerFinancialAccount()?->getId(), [
                new Assert\NotNull(message: 'BR-DE-31', groups: ['XRechnung']),
            ]);
        }

        if (in_array($this->getPaymentMeansCode()?->value, ['30', '58'])) {
            $context->getValidator()->inContext($context)->atPath('payeeFinancialAccount')
                ->validate($this->getPayeeFinancialAccount(), new Assert\Sequentially([
                    new Assert\NotNull(message: 'BR-61'),
                    new Assert\Callback(
                        function (?FinancialAccountType $payeeFinancialAccount, ExecutionContextInterface $accountContext) {
                            $accountContext->getValidator()->inContext($accountContext)->atPath('id')->validate($payeeFinancialAccount->getId()?->value, [
                                new Assert\NotBlank(message: 'BR-50'),
                            ]);
                        }
                    )
                ]));
            $this->validateParts($context,
                new Assert\NotNull(message: 'BR-DE-23-a', groups: ['XRechnung']), // same as BR-61
                new Assert\IsNull(message: 'BR-DE-23-b', groups: ['XRechnung']),
                new Assert\IsNull(message: 'BR-DE-23-b', groups: ['XRechnung'])
            );
            if ('58' === $this->getPaymentMeansCode()?->value) {
                $context->getValidator()->inContext($context)->atPath('payeeFinancialAccount.id')->validate(
                    $this->getPayeeFinancialAccount()?->getId()?->value, [
                    new Assert\Iban(message: 'BR-DE-19', groups: ['XRechnung'])
                ]);
            }
        }
        if (in_array($this->getPaymentMeansCode()?->value, ['48','54','55'])) {
            $this->validateParts($context,
                new Assert\IsNull(message: 'BR-DE-24-a', groups: ['XRechnung']),
                new Assert\NotNull(message: 'BR-DE-24-b', groups: ['XRechnung']),
                new Assert\IsNull(message: 'BR-DE-24-b', groups: ['XRechnung'])
            );
        }
        if ('59' === $this->getPaymentMeansCode()?->value) {
            $this->validateParts($context,
                new Assert\IsNull(message: 'BR-DE-24-a', groups: ['XRechnung']),
                new Assert\IsNull(message: 'BR-DE-24-b', groups: ['XRechnung']),
                new Assert\NotNull(message: 'BR-DE-24-b', groups: ['XRechnung'])
            );
            $context->getValidator()->inContext($context)->atPath('paymentMandate.payerFinancialAccount.id')->validate(
                $this->getPaymentMandate()?->getPayerFinancialAccount()?->getId()?->value, [
                new Assert\Iban(message: 'BR-DE-20', groups: ['XRechnung'])
            ]);
        }
        if (in_array($this->getPaymentMeansCode()?->value, ['49', '59'])) {
            $context->getValidator()->inContext($context)->atPath('paymentMandate.id')->validate(
                $this->getPaymentMandate()?->getId()?->value, [
                new Assert\Iban(message: 'PEPPOL-EN16931-R061', groups: ['XRechnung'])
            ]);
        }
    }

    protected function validateParts(ExecutionContextInterface $context, Constraint $payeeFinancialAccount, Constraint $cardAccount, Constraint $paymentMandate): void
    {
        $context->getValidator()->inContext($context)->atPath('payeeFinancialAccount')
            ->validate($this->getPayeeFinancialAccount(), [
                $payeeFinancialAccount,
            ]);
        $context->getValidator()->inContext($context)->atPath('cardAccount')
            ->validate($this->getCardAccount(), [
                $cardAccount,
            ]);
        $context->getValidator()->inContext($context)->atPath('paymentMandate')
            ->validate($this->getPaymentMandate(), [
                $paymentMandate,
            ]);
    }
}