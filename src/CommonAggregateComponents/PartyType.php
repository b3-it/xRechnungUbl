<?php /** @noinspection PhpUnused */


namespace UBL\CommonAggregateComponents;


use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\Indicator;

class PartyType
{

    /**
     * @param PartyIdentificationType[] $partyIdentifications
     * @param PartyNameType[] $partyNames
     * @param PartyTaxSchemeType[] $partyTaxSchemes
     * @param PartyLegalEntityType[] $partyLegalEntities
     * @param PersonType[] $persons
     * @param ServiceProviderPartyType[] $serviceProviderParties
     * @param PowerOfAttorneyType[] $powerOfAttorneys
     */
    public function __construct(
        #[SerializedName('MarkCareIndicator')]
        protected ?Indicator $markCareIndicator = null,
        #[SerializedName('MarkAttentionIndicator')]
        protected ?Indicator $markAttentionIndicator = null,
        #[SerializedName('WebsiteURI')]
        protected ?IdentifierType $websiteURI = null,
        #[SerializedName('LogoReferenceID')]
        protected ?IdentifierType $logoReferenceID = null,
        #[SerializedName('EndpointID')]
        protected ?IdentifierType $endpointID = null,
        #[SerializedName('IndustryClassificationCode')]
        protected ?CodeType $industryClassificationCode = null,
        #[SerializedName('PartyIdentification')]
        protected array $partyIdentifications = [],
        #[SerializedName('PartyName')]
        protected array $partyNames = [],
        #[SerializedName('Language')]
        protected ?LanguageType $language = null,
        #[SerializedName('PostalAddress')]
        protected ?AddressType $postalAddress = null,
        #[SerializedName('PhysicalLocation')]
        protected ?LocationType $physicalLocation = null,
        #[SerializedName('PartyTaxScheme')]
        protected array $partyTaxSchemes = [],
        #[SerializedName('PartyLegalEntity')]
        protected array $partyLegalEntities = [],

        #[SerializedName('Contact')]
        protected ?ContactType $contact = null,
        #[SerializedName('Person')]
        protected array $persons = [],
        #[SerializedName('AgentParty')]
        protected ?PartyType $agentParty = null,
        #[SerializedName('ServiceProviderParty')]
        protected array $serviceProviderParties = [],
        #[SerializedName('PowerOfAttorney')]
        protected array $powerOfAttorneys = [],
        #[SerializedName('FinancialAccount')]
        protected ?FinancialAccountType $financialAccount = null,
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }

    public function getMarkCareIndicator(): ?Indicator
    {
        return $this->markCareIndicator;
    }

    public function setMarkCareIndicator(?Indicator $markCareIndicator): void
    {
        $this->markCareIndicator = $markCareIndicator;
    }

    public function getMarkAttentionIndicator(): ?Indicator
    {
        return $this->markAttentionIndicator;
    }

    public function setMarkAttentionIndicator(?Indicator $markAttentionIndicator): void
    {
        $this->markAttentionIndicator = $markAttentionIndicator;
    }

    public function getWebsiteURI(): ?IdentifierType
    {
        return $this->websiteURI;
    }

    public function setWebsiteURI(?IdentifierType $websiteURI): void
    {
        $this->websiteURI = $websiteURI;
    }

    public function getLogoReferenceID(): ?IdentifierType
    {
        return $this->logoReferenceID;
    }

    public function setLogoReferenceID(?IdentifierType $logoReferenceID): void
    {
        $this->logoReferenceID = $logoReferenceID;
    }

    public function getEndpointID(): ?IdentifierType
    {
        return $this->endpointID;
    }

    public function setEndpointID(?IdentifierType $endpointID): void
    {
        $this->endpointID = $endpointID;
    }

    public function getIndustryClassificationCode(): ?CodeType
    {
        return $this->industryClassificationCode;
    }

    public function setIndustryClassificationCode(?CodeType $industryClassificationCode): void
    {
        $this->industryClassificationCode = $industryClassificationCode;
    }


    /**
     * @return PartyIdentificationType[]
     */
    public function getPartyIdentifications(): array
    {
        return $this->partyIdentifications;
    }

    /**
     * @param PartyIdentificationType[] $partyIdentifications
     * @return void
     */
    public function setPartyIdentifications(array $partyIdentifications): void
    {
        $this->partyIdentifications = $partyIdentifications;
    }

    public function getLanguage(): ?LanguageType
    {
        return $this->language;
    }

    public function setLanguage(?LanguageType $language): void
    {
        $this->language = $language;
    }

    /**
     * @return PartyNameType[]
     */
    public function getPartyNames(): array
    {
        return $this->partyNames;
    }

    /**
     * @param PartyNameType[] $partyNames
     * @return void
     */
    public function setPartyNames(array $partyNames): void
    {
        $this->partyNames = $partyNames;
    }

    public function getPostalAddress(): ?AddressType
    {
        return $this->postalAddress;
    }

    public function setPostalAddress(?AddressType $postalAddress): void
    {
        $this->postalAddress = $postalAddress;
    }

    public function getPhysicalLocation(): ?LocationType
    {
        return $this->physicalLocation;
    }

    public function setPhysicalLocation(?LocationType $physicalLocation): void
    {
        $this->physicalLocation = $physicalLocation;
    }


    /**
     * @return PartyTaxSchemeType[]
     */
    public function getPartyTaxSchemes(): array
    {
        return $this->partyTaxSchemes;
    }

    /**
     * @param PartyTaxSchemeType[] $partyTaxSchemes
     * @return void
     */
    public function setPartyTaxSchemes(array $partyTaxSchemes): void
    {
        $this->partyTaxSchemes = $partyTaxSchemes;
    }

    public function addPartyTaxScheme(?PartyTaxSchemeType $partyTaxScheme = null): PartyTaxSchemeType
    {
        return $this->partyTaxSchemes []= $partyTaxScheme ?? new PartyTaxSchemeType;
    }

    /**
     * @return PartyLegalEntityType[]
     */
    public function getPartyLegalEntities(): array
    {
        return $this->partyLegalEntities;
    }

    /**
     * @param PartyLegalEntityType[] $partyLegalEntities
     * @return void
     */
    public function setPartyLegalEntities(array $partyLegalEntities): void
    {
        $this->partyLegalEntities = $partyLegalEntities;
    }

    public function addPartyLegalEntity(?PartyLegalEntityType $partyLegalEntity = null): PartyLegalEntityType
    {
        return $this->partyLegalEntities []= $partyLegalEntity ?? new PartyLegalEntityType();
    }

    public function getContact(): ?ContactType
    {
        return $this->contact;
    }

    public function setContact(?ContactType $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return PersonType[]
     */
    public function getPersons(): array
    {
        return $this->persons;
    }

    /**
     * @param PersonType[] $persons
     * @return void
     */
    public function setPersons(array $persons): void
    {
        $this->persons = $persons;
    }

    public function getAgentParty(): ?PartyType
    {
        return $this->agentParty;
    }

    public function setAgentParty(?PartyType $agentParty): void
    {
        $this->agentParty = $agentParty;
    }

    /**
     * @return ServiceProviderPartyType[]
     */
    public function getServiceProviderParties(): array
    {
        return $this->serviceProviderParties;
    }

    /**
     * @param ServiceProviderPartyType[] $serviceProviderParties
     * @return void
     */
    public function setServiceProviderParties(array $serviceProviderParties): void
    {
        $this->serviceProviderParties = $serviceProviderParties;
    }

    /**
     * @return PowerOfAttorneyType[]
     */
    public function getPowerOfAttorneys(): array
    {
        return $this->powerOfAttorneys;
    }

    /**
     * @param PowerOfAttorneyType[] $powerOfAttorneys
     * @return void
     */
    public function setPowerOfAttorneys(array $powerOfAttorneys): void
    {
        $this->powerOfAttorneys = $powerOfAttorneys;
    }

    public function getFinancialAccount(): ?FinancialAccountType
    {
        return $this->financialAccount;
    }

    public function setFinancialAccount(?FinancialAccountType $financialAccount): void
    {
        $this->financialAccount = $financialAccount;
    }
}