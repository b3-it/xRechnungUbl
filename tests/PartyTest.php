<?php

namespace UBL\Tests;

use UBL\CommonAggregateComponents\PartyLegalEntityType;
use UBL\CommonAggregateComponents\PartyNameType;
use UBL\CommonAggregateComponents\PartyTaxSchemeType;
use UBL\Serializer\EmptyArray;
use UBL\CommonAggregateComponents\SupplierPartyType;

class PartyTest extends AbstractTypeTest
{

    public function testDeserializeSupplierParty()
    {
        $str = file_get_contents(__DIR__ . '/assets/SupplierParty.xml');

        /**
         * @var $val SupplierPartyType
         */
        $val = $this->deserialize($str, SupplierPartyType::class);
        $party = $val->getParty();

        self::assertSame('EM', $party->getEndpointID()->schemeID);
        self::assertSame('seller@email.de', $party->getEndpointID()->value);

        $names = $party->getPartyNames();
        self::assertCount(1, $names);
        self::assertSame('[Seller trading name]', $names[0]->name->value);
        $taxSchemes = $party->getPartyTaxSchemes();
        self::assertCount(1, $taxSchemes);
        self::assertSame('DE 123456789', $taxSchemes[0]->getCompanyID()->value);
        self::assertSame('VAT', $taxSchemes[0]->getTaxScheme()->getId()->value);

        $partyLegalEntities = $party->getPartyLegalEntities();
        self::assertCount(1, $partyLegalEntities);
        self::assertSame('[Seller name]', $partyLegalEntities[0]->getRegistrationName()->value);
        self::assertSame('[HRA-Eintrag]', $partyLegalEntities[0]->getCompanyID()->value);
        self::assertSame('123/456/7890, HRA-Eintrag in […]', $partyLegalEntities[0]->getCompanyLegalForm()->value);

        $contact = $party->getContact();

        self::assertSame('nicht vorhanden', $contact->getName()->value);
        self::assertSame('+49 1234-5678', $contact->getTelephone()->value);
        self::assertSame('seller@email.de', $contact->getElectronicMail()->value);
    }
}