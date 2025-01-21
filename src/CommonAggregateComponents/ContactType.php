<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\TextType;

class ContactType
{
    /**
     * @param TextType[] $notes
     * @param CommunicationType[] $otherCommunications
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('Telephone')]
        protected ?TextType $telephone = null,
        #[SerializedName('Telefax')]
        protected ?TextType $telefax = null,
        #[SerializedName('ElectronicMail')]
        protected ?TextType $electronicMail = null,
        #[SerializedName('Note')]
        protected array $notes = [],
        #[SerializedName('OtherCommunication')]
        protected array $otherCommunications = []
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

    public function getName(): ?NameType
    {
        return $this->name;
    }

    public function setName(?NameType $name): void
    {
        $this->name = $name;
    }

    public function getTelephone(): ?TextType
    {
        return $this->telephone;
    }

    public function setTelephone(?TextType $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getTelefax(): ?TextType
    {
        return $this->telefax;
    }

    public function setTelefax(?TextType $telefax): void
    {
        $this->telefax = $telefax;
    }

    public function getElectronicMail(): ?TextType
    {
        return $this->electronicMail;
    }

    public function setElectronicMail(?TextType $electronicMail): void
    {
        $this->electronicMail = $electronicMail;
    }

    /**
     * @return TextType[]
     */
    public function getNotes(): array
    {
        return $this->notes;
    }

    /**
     * @param TextType[] $notes
     * @return void
     */
    public function setNotes(array $notes): void
    {
        $this->notes = [];
        foreach ($notes as $note) {
            $this->addNote($note);
        }
    }

    public function addNote(TextType $note): self
    {
        $this->notes []= $note;
        return $this;
    }

    /**
     * @return CommunicationType[]
     */
    public function getOtherCommunications(): array
    {
        return $this->otherCommunications;
    }

    /**
     * @param CommunicationType[] $otherCommunications
     * @return void
     */
    public function setOtherCommunications(array $otherCommunications): void
    {
        $this->otherCommunications = [];
        foreach ($otherCommunications as $communication) {
            $this->addOtherCommunication($communication);
        }
    }

    public function addOtherCommunication(CommunicationType $communication): self
    {
        $this->otherCommunications[] = $communication;
        return $this;
    }
}