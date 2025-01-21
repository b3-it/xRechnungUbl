<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;

class LanguageType
{
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('LocaleCode')]
        protected ?CodeType $localeCode = null
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

    public function getLocaleCode(): ?CodeType
    {
        return $this->localeCode;
    }

    public function setLocaleCode(?CodeType $localeCode): void
    {
        $this->localeCode = $localeCode;
    }
}