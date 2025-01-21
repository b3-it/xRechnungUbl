<?php


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\NameType;

class ItemPropertyGroupType
{

    public function __construct(
        #[SerializedName("ID")]
        protected ?IdentifierType $id = null,
        #[SerializedName("Name")]
        protected ?NameType $name = null,
        #[SerializedName("ImportanceCode")]
        protected ?CodeType $importanceCode = null
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

    public function getName(): ?NameType
    {
        return $this->name;
    }

    public function setName(?NameType $name): void
    {
        $this->name = $name;
    }

    public function getImportanceCode(): ?CodeType
    {
        return $this->importanceCode;
    }

    public function setImportanceCode(?CodeType $importanceCode): void
    {
        $this->importanceCode = $importanceCode;
    }
}