<?php


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class ClauseType
{

    /**
     * @param TextType[] $contents
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('Content')]
        protected array $contents = []
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

    /**
     * @return TextType[]
     */
    public function getContents(): array
    {
        return $this->contents;
    }

    /**
     * @param TextType[] $contents
     */
    public function setContents(array $contents): void
    {
        $this->contents = [];
        foreach ($contents as $content) {
            $this->addContent($content);
        }
    }

    public function addContent(TextType $content): self
    {
        $this->contents []= $content;
        return $this;
    }
}