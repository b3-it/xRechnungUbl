<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use UBL\UnqualifiedDataTypes\Indicator;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\NumericType;
use UBL\UnqualifiedDataTypes\QuantityType;
use UBL\UnqualifiedDataTypes\TextType;

class ItemType
{
    /**
     * @param TextType[] $descriptions
     * @param TextType[] $additionalInformations
     * @param TextType[] $keywords
     * @param NameType[] $brandNames
     * @param NameType[] $modelNames
     * @param ItemIdentificationType[] $manufacturersItemIdentifications
     * @param ItemIdentificationType[] $additionalItemIdentifications
     * @param DocumentReferenceType[] $itemSpecificationDocumentReferences
     * @param CommodityClassificationType[] $commodityClassifications
     * @param TransactionConditionsType[] $transactionConditions
     * @param HazardousItemType[] $hazardousItems
     * @param TaxCategoryType[] $classifiedTaxCategories
     * @param ItemPropertyType[] $additionalItemProperties
     * @param PartyType[] $manufacturerParties
     * @param AddressType[] $originAddresses
     * @param ItemInstanceType[] $itemInstances
     * @param CertificateType[] $certificates
     * @param DimensionType[] $dimensions
     */
    public function __construct(
        #[SerializedName('Description')]
        protected array $descriptions = [],
        #[SerializedName('PackQuantity')]
        protected ?QuantityType $packQuantity = null,
        #[SerializedName('PackSizeNumeric')]
        protected ?NumericType $packSizeNumeric = null,
        #[SerializedName('CatalogueIndicator')]
        protected ?Indicator $catalogueIndicator = null,
        #[SerializedName('Name')]
        protected ?NameType $name = null,
        #[SerializedName('HazardousRiskIndicator')]
        protected ?Indicator $hazardousRiskIndicator = null,
        #[SerializedName('AdditionalInformation')]
        protected array $additionalInformations = [],
        #[SerializedName('Keyword')]
        protected array $keywords = [],
        #[SerializedName('BrandName')]
        protected array $brandNames = [],
        #[SerializedName('ModelName')]
        protected array $modelNames = [],
        #[Assert\Valid]
        #[SerializedName('BuyersItemIdentification')]
        protected ?ItemIdentificationType $buyersItemIdentification = null,
        #[Assert\Valid]
        #[SerializedName('SellersItemIdentification')]
        protected ?ItemIdentificationType $sellersItemIdentification = null,
        #[Assert\Valid]
        #[SerializedName('ManufacturersItemIdentification')]
        protected array $manufacturersItemIdentifications = [],
        #[Assert\Valid]
        #[SerializedName('StandardItemIdentification')]
        protected ?ItemIdentificationType $standardItemIdentification = null,
        #[Assert\Valid]
        #[SerializedName('CatalogueItemIdentification')]
        protected ?ItemIdentificationType $catalogueItemIdentification = null,
        #[Assert\Valid]
        #[SerializedName('AdditionalItemIdentification')]
        protected array $additionalItemIdentifications = [],
        #[SerializedName('CatalogueDocumentReference')]
        protected ?DocumentReferenceType $catalogueDocumentReference = null,
        #[SerializedName('ItemSpecificationDocumentReference')]
        protected array $itemSpecificationDocumentReferences = [],
        #[SerializedName('OriginCountry')]
        protected ?CountryType $originCountry = null,
        #[SerializedName('CommodityClassification')]
        protected array $commodityClassifications = [],
        #[SerializedName('TransactionConditions')]
        protected array $transactionConditions = [],
        #[SerializedName('HazardousItem')]
        protected array $hazardousItems = [],
        #[Assert\Valid]
        #[SerializedName('ClassifiedTaxCategory')]
        protected array $classifiedTaxCategories = [],
        #[Assert\Valid]
        #[SerializedName('AdditionalItemProperty')]
        protected array $additionalItemProperties = [],
        #[SerializedName('ManufacturerParty')]
        protected array $manufacturerParties = [],
        #[SerializedName('InformationContentProviderParty')]
        protected ?PartyType $informationContentProviderParty = null,
        #[SerializedName('OriginAddress')]
        protected array $originAddresses = [],
        #[SerializedName('ItemInstance')]
        protected array $itemInstances = [],
        #[SerializedName('Certificate')]
        protected array $certificates = [],
        #[SerializedName('Dimension')]
        protected array $dimensions = [],
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    /**
     * @return TextType[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param TextType[] $descriptions
     * @return void
     */
    public function setDescriptions(array $descriptions): void
    {
        $this->descriptions = [];
        foreach ($descriptions as $description) {
            $this->addDescription($description);
        }
    }
    public function addDescription(?TextType $description): TextType
    {
        return $this->descriptions []= $description ?? new TextType();
    }

    public function getPackQuantity(): ?QuantityType
    {
        return $this->packQuantity;
    }

    public function setPackQuantity(?QuantityType $packQuantity): void
    {
        $this->packQuantity = $packQuantity;
    }

    public function getPackSizeNumeric(): ?NumericType
    {
        return $this->packSizeNumeric;
    }

    public function setPackSizeNumeric(?NumericType $packSizeNumeric): void
    {
        $this->packSizeNumeric = $packSizeNumeric;
    }

    public function getCatalogueIndicator(): ?Indicator
    {
        return $this->catalogueIndicator;
    }

    public function setCatalogueIndicator(?Indicator $catalogueIndicator): void
    {
        $this->catalogueIndicator = $catalogueIndicator;
    }

    public function getName(): ?NameType
    {
        return $this->name;
    }

    public function setName(?NameType $name): void
    {
        $this->name = $name;
    }

    public function getHazardousRiskIndicator(): ?Indicator
    {
        return $this->hazardousRiskIndicator;
    }

    public function setHazardousRiskIndicator(?Indicator $hazardousRiskIndicator): void
    {
        $this->hazardousRiskIndicator = $hazardousRiskIndicator;
    }

    public function getAdditionalInformations(): array
    {
        return $this->additionalInformations;
    }

    public function setAdditionalInformations(array $additionalInformations): void
    {
        $this->additionalInformations = $additionalInformations;
    }

    public function getKeywords(): array
    {
        return $this->keywords;
    }

    public function setKeywords(array $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getBrandNames(): array
    {
        return $this->brandNames;
    }

    public function setBrandNames(array $brandNames): void
    {
        $this->brandNames = $brandNames;
    }

    public function getModelNames(): array
    {
        return $this->modelNames;
    }

    public function setModelNames(array $modelNames): void
    {
        $this->modelNames = $modelNames;
    }

    public function getBuyersItemIdentification(): ?ItemIdentificationType
    {
        return $this->buyersItemIdentification;
    }

    public function setBuyersItemIdentification(?ItemIdentificationType $buyersItemIdentification): void
    {
        $this->buyersItemIdentification = $buyersItemIdentification;
    }

    public function getSellersItemIdentification(): ?ItemIdentificationType
    {
        return $this->sellersItemIdentification;
    }

    public function setSellersItemIdentification(?ItemIdentificationType $sellersItemIdentification): void
    {
        $this->sellersItemIdentification = $sellersItemIdentification;
    }

    public function getManufacturersItemIdentifications(): array
    {
        return $this->manufacturersItemIdentifications;
    }

    public function setManufacturersItemIdentifications(array $manufacturersItemIdentifications): void
    {
        $this->manufacturersItemIdentifications = $manufacturersItemIdentifications;
    }

    public function getStandardItemIdentification(): ?ItemIdentificationType
    {
        return $this->standardItemIdentification;
    }

    public function setStandardItemIdentification(?ItemIdentificationType $standardItemIdentification): void
    {
        $this->standardItemIdentification = $standardItemIdentification;
    }

    public function getCatalogueItemIdentification(): ?ItemIdentificationType
    {
        return $this->catalogueItemIdentification;
    }

    public function setCatalogueItemIdentification(?ItemIdentificationType $catalogueItemIdentification): void
    {
        $this->catalogueItemIdentification = $catalogueItemIdentification;
    }

    public function getAdditionalItemIdentifications(): array
    {
        return $this->additionalItemIdentifications;
    }

    public function setAdditionalItemIdentifications(array $additionalItemIdentifications): void
    {
        $this->additionalItemIdentifications = $additionalItemIdentifications;
    }

    public function getCatalogueDocumentReference(): ?DocumentReferenceType
    {
        return $this->catalogueDocumentReference;
    }

    public function setCatalogueDocumentReference(?DocumentReferenceType $catalogueDocumentReference): void
    {
        $this->catalogueDocumentReference = $catalogueDocumentReference;
    }

    public function getItemSpecificationDocumentReferences(): array
    {
        return $this->itemSpecificationDocumentReferences;
    }

    public function setItemSpecificationDocumentReferences(array $itemSpecificationDocumentReferences): void
    {
        $this->itemSpecificationDocumentReferences = $itemSpecificationDocumentReferences;
    }

    public function getOriginCountry(): ?CountryType
    {
        return $this->originCountry;
    }

    public function setOriginCountry(?CountryType $originCountry): void
    {
        $this->originCountry = $originCountry;
    }

    /**
     * @return CommodityClassificationType[]
     */
    public function getCommodityClassifications(): array
    {
        return $this->commodityClassifications;
    }

    /**
     * @param CommodityClassificationType[] $commodityClassifications
     */
    public function setCommodityClassifications(array $commodityClassifications): void
    {
        $this->commodityClassifications = $commodityClassifications;
    }

    public function getTransactionConditions(): array
    {
        return $this->transactionConditions;
    }

    public function setTransactionConditions(array $transactionConditions): void
    {
        $this->transactionConditions = $transactionConditions;
    }

    public function getHazardousItems(): array
    {
        return $this->hazardousItems;
    }

    public function setHazardousItems(array $hazardousItems): void
    {
        $this->hazardousItems = $hazardousItems;
    }

    /**
     * @return TaxCategoryType[]
     */
    public function getClassifiedTaxCategories(): array
    {
        return $this->classifiedTaxCategories;
    }

    /**
     * @param TaxCategoryType[] $classifiedTaxCategories
     * @return void
     */
    public function setClassifiedTaxCategories(array $classifiedTaxCategories): void
    {
        $this->classifiedTaxCategories = [];
        foreach ($classifiedTaxCategories as $taxCategory) {
            $this->addClassifiedTaxCategory($taxCategory);
        }
    }

    public function addClassifiedTaxCategory(?TaxCategoryType $taxCategory): TaxCategoryType
    {
        return $this->classifiedTaxCategories []= $taxCategory ?? new TaxCategoryType();
    }

    /**
     * @return ItemPropertyType[]
     */
    public function getAdditionalItemProperties(): array
    {
        return $this->additionalItemProperties;
    }

    /**
     * @param ItemPropertyType[] $additionalItemProperties
     * @return void
     */
    public function setAdditionalItemProperties(array $additionalItemProperties): void
    {
        $this->additionalItemProperties = [];
        foreach ($additionalItemProperties as $itemProperty) {
            $this->addAdditionalItemProperty($itemProperty);
        }
    }

    public function addAdditionalItemProperty(?ItemPropertyType $property): ItemPropertyType
    {
        return $this->additionalItemProperties []= $property ?? new ItemPropertyType();
    }

    public function getManufacturerParties(): array
    {
        return $this->manufacturerParties;
    }

    public function setManufacturerParties(array $manufacturerParties): void
    {
        $this->manufacturerParties = $manufacturerParties;
    }

    public function getInformationContentProviderParty(): ?PartyType
    {
        return $this->informationContentProviderParty;
    }

    public function setInformationContentProviderParty(?PartyType $informationContentProviderParty): void
    {
        $this->informationContentProviderParty = $informationContentProviderParty;
    }

    public function getOriginAddresses(): array
    {
        return $this->originAddresses;
    }

    public function setOriginAddresses(array $originAddresses): void
    {
        $this->originAddresses = $originAddresses;
    }

    public function getItemInstances(): array
    {
        return $this->itemInstances;
    }

    public function setItemInstances(array $itemInstances): void
    {
        $this->itemInstances = $itemInstances;
    }

    public function getCertificates(): array
    {
        return $this->certificates;
    }

    public function setCertificates(array $certificates): void
    {
        $this->certificates = $certificates;
    }

    public function getDimensions(): array
    {
        return $this->dimensions;
    }

    public function setDimensions(array $dimensions): void
    {
        $this->dimensions = $dimensions;
    }
}