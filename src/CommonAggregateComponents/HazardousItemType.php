<?php

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\MeasureType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class HazardousItemType
{

    /**
     * @param TextType[] $additionalInformations
     * @param SecondaryHazardType[] $secondaryHazards
     * @param HazardousGoodsTransitType[] $hazardousGoodsTransits
     * @param TemperatureType[] $additionalTemperatures
     */
    public function __construct(
        #[SerializedName('ID')]
        protected ?IdentifierType $id = null,
        #[SerializedName('PlacardNotation')]
        protected ?TextType $placardNotation = null,
        #[SerializedName('PlacardEndorsement')]
        protected ?TextType $placardEndorsement = null,
        #[SerializedName('AdditionalInformation')]
        protected array $additionalInformations = [],
        #[SerializedName('UNDGCode')]
        protected ?CodeType $undgCode = null,
        #[SerializedName('EmergencyProceduresCode')]
        protected ?CodeType $emergencyProceduresCode = null,
        #[SerializedName('MedicalFirstAidGuideCode')]
        protected ?CodeType $medicalFirstAidGuideCode = null,
        #[SerializedName('TechnicalName')]
        protected ?NameType $technicalName = null,
        #[SerializedName('CategoryName')]
        protected ?NameType $categoryName = null,
        #[SerializedName('HazardousCategoryCode')]
        protected ?CodeType $hazardousCategoryCode = null,
        #[SerializedName('UpperOrangeHazardPlacardID')]
        protected ?IdentifierType $upperOrangeHazardPlacardID = null,
        #[SerializedName('LowerOrangeHazardPlacardID')]
        protected ?IdentifierType $lowerOrangeHazardPlacardID = null,
        #[SerializedName('MarkingID')]
        protected ?IdentifierType $markingID = null,
        #[SerializedName('HazardClassID')]
        protected ?IdentifierType $hazardClassID = null,
        #[SerializedName('NetWeightMeasure')]
        protected ?MeasureType $netWeightMeasure = null,
        #[SerializedName('NetVolumeMeasure')]
        protected ?MeasureType $netVolumeMeasure = null,
        #[SerializedName('Quantity')]
        protected ?QuantityType $quantity = null,
        #[SerializedName('ContactParty')]
        protected ?PartyType $contactParty = null,
        #[SerializedName('SecondaryHazard')]
        protected array $secondaryHazards = [],
        #[SerializedName('HazardousGoodsTransit')]
        protected array $hazardousGoodsTransits = [],
        #[SerializedName('EmergencyTemperature')]
        protected ?TemperatureType $emergencyTemperature = null,
        #[SerializedName('FlashpointTemperature')]
        protected ?TemperatureType $flashpointTemperature = null,
        #[SerializedName('AdditionalTemperature')]
        protected array $additionalTemperatures = []
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

    /**
     * @return TextType[]
     */
    public function getAdditionalInformations(): array
    {
        return $this->additionalInformations;
    }

    /**
     * @param TextType[] $additionalInformations
     * @return void
     */
    public function setAdditionalInformations(array $additionalInformations): void
    {
        $this->additionalInformations = [];
        foreach ($additionalInformations as $additionalInformation) {
            $this->addAdditionalInformation($additionalInformation);
        }
    }
    public function addAdditionalInformation(TextType $additionalInformation): void
    {
        $this->additionalInformations []= $additionalInformation;
    }

    public function getUndgCode(): ?CodeType
    {
        return $this->undgCode;
    }

    public function setUndgCode(?CodeType $undgCode): void
    {
        $this->undgCode = $undgCode;
    }

    public function getEmergencyProceduresCode(): ?CodeType
    {
        return $this->emergencyProceduresCode;
    }

    public function setEmergencyProceduresCode(?CodeType $emergencyProceduresCode): void
    {
        $this->emergencyProceduresCode = $emergencyProceduresCode;
    }

    public function getMedicalFirstAidGuideCode(): ?CodeType
    {
        return $this->medicalFirstAidGuideCode;
    }

    public function setMedicalFirstAidGuideCode(?CodeType $medicalFirstAidGuideCode): void
    {
        $this->medicalFirstAidGuideCode = $medicalFirstAidGuideCode;
    }

    public function getTechnicalName(): ?NameType
    {
        return $this->technicalName;
    }

    public function setTechnicalName(?NameType $technicalName): void
    {
        $this->technicalName = $technicalName;
    }

    public function getCategoryName(): ?NameType
    {
        return $this->categoryName;
    }

    public function setCategoryName(?NameType $categoryName): void
    {
        $this->categoryName = $categoryName;
    }

    public function getHazardousCategoryCode(): ?CodeType
    {
        return $this->hazardousCategoryCode;
    }

    public function setHazardousCategoryCode(?CodeType $hazardousCategoryCode): void
    {
        $this->hazardousCategoryCode = $hazardousCategoryCode;
    }

    public function getUpperOrangeHazardPlacardID(): ?IdentifierType
    {
        return $this->upperOrangeHazardPlacardID;
    }

    public function setUpperOrangeHazardPlacardID(?IdentifierType $upperOrangeHazardPlacardID): void
    {
        $this->upperOrangeHazardPlacardID = $upperOrangeHazardPlacardID;
    }

    public function getLowerOrangeHazardPlacardID(): ?IdentifierType
    {
        return $this->lowerOrangeHazardPlacardID;
    }

    public function setLowerOrangeHazardPlacardID(?IdentifierType $lowerOrangeHazardPlacardID): void
    {
        $this->lowerOrangeHazardPlacardID = $lowerOrangeHazardPlacardID;
    }

    public function getMarkingID(): ?IdentifierType
    {
        return $this->markingID;
    }

    public function setMarkingID(?IdentifierType $markingID): void
    {
        $this->markingID = $markingID;
    }

    public function getHazardClassID(): ?IdentifierType
    {
        return $this->hazardClassID;
    }

    public function setHazardClassID(?IdentifierType $hazardClassID): void
    {
        $this->hazardClassID = $hazardClassID;
    }

    public function getNetWeightMeasure(): ?MeasureType
    {
        return $this->netWeightMeasure;
    }

    public function setNetWeightMeasure(?MeasureType $netWeightMeasure): void
    {
        $this->netWeightMeasure = $netWeightMeasure;
    }

    public function getNetVolumeMeasure(): ?MeasureType
    {
        return $this->netVolumeMeasure;
    }

    public function setNetVolumeMeasure(?MeasureType $netVolumeMeasure): void
    {
        $this->netVolumeMeasure = $netVolumeMeasure;
    }

    public function getQuantity(): ?QuantityType
    {
        return $this->quantity;
    }

    public function setQuantity(?QuantityType $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getContactParty(): ?PartyType
    {
        return $this->contactParty;
    }

    public function setContactParty(?PartyType $contactParty): void
    {
        $this->contactParty = $contactParty;
    }

    /**
     * @return SecondaryHazardType[]
     */
    public function getSecondaryHazards(): array
    {
        return $this->secondaryHazards;
    }

    /**
     * @param SecondaryHazardType[] $secondaryHazards
     * @return void
     */
    public function setSecondaryHazards(array $secondaryHazards): void
    {
        $this->secondaryHazards = [];
        foreach ($secondaryHazards as $secondaryHazard) {
            $this->addSecondaryHazard($secondaryHazard);
        }
    }
    public function addSecondaryHazard(SecondaryHazardType $secondaryHazard): void
    {
        $this->secondaryHazards []= $secondaryHazard;
    }

    public function getHazardousGoodsTransits(): array
    {
        return $this->hazardousGoodsTransits;
    }

    public function setHazardousGoodsTransits(array $hazardousGoodsTransits): void
    {
        $this->hazardousGoodsTransits = $hazardousGoodsTransits;
    }

    public function getEmergencyTemperature(): ?TemperatureType
    {
        return $this->emergencyTemperature;
    }

    public function setEmergencyTemperature(?TemperatureType $emergencyTemperature): void
    {
        $this->emergencyTemperature = $emergencyTemperature;
    }

    public function getFlashpointTemperature(): ?TemperatureType
    {
        return $this->flashpointTemperature;
    }

    public function setFlashpointTemperature(?TemperatureType $flashpointTemperature): void
    {
        $this->flashpointTemperature = $flashpointTemperature;
    }

    /**
     * @return TemperatureType[]
     */
    public function getAdditionalTemperatures(): array
    {
        return $this->additionalTemperatures;
    }

    /**
     * @param TemperatureType[] $additionalTemperatures
     * @return void
     */
    public function setAdditionalTemperatures(array $additionalTemperatures): void
    {
        $this->additionalTemperatures = [];
        foreach ($additionalTemperatures as $additionalTemperature) {
            $this->addAdditionalTemperature($additionalTemperature);
        }
    }

    public function addAdditionalTemperature(TemperatureType $additionalTemperature): void
    {
        $this->additionalTemperatures []= $additionalTemperature;
    }
}