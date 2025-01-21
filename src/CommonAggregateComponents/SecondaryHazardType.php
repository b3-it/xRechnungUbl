<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\TextType;

class SecondaryHazardType
{
    /**
     * @param TextType[] $extensions
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('PlacardNotation')]
        protected ?TextType $placardNotation = null,
        #[SerializedName('PlacardEndorsement')]
        protected ?TextType $placardEndorsement = null,
        #[SerializedName('EmergencyProceduresCode')]
        protected ?CodeType $emergencyProceduresCode = null,
        #[SerializedName('Extension')]
        protected array $extensions = []
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

    public function getPlacardNotation(): ?TextType
    {
        return $this->placardNotation;
    }

    public function setPlacardNotation(?TextType $placardNotation): void
    {
        $this->placardNotation = $placardNotation;
    }

    public function getPlacardEndorsement(): ?TextType
    {
        return $this->placardEndorsement;
    }

    public function setPlacardEndorsement(?TextType $placardEndorsement): void
    {
        $this->placardEndorsement = $placardEndorsement;
    }

    public function getEmergencyProceduresCode(): ?CodeType
    {
        return $this->emergencyProceduresCode;
    }

    public function setEmergencyProceduresCode(?CodeType $emergencyProceduresCode): void
    {
        $this->emergencyProceduresCode = $emergencyProceduresCode;
    }

    /**
     * @return TextType[]
     */
    public function getExtensions(): array
    {
        return $this->extensions;
    }

    /**
     * @param TextType[] $extensions
     * @return void
     */
    public function setExtensions(array $extensions): void
    {
        $this->extensions = [];
        foreach ($extensions as $extension) {
            $this->addExtension($extension);
        }
    }

    public function addExtension(TextType $extension): void
    {
        $this->extensions []= $extension;
    }
}