<?php

namespace UBL\Tests;

use Symfony\Component\Serializer\Encoder\XmlEncoder;
use UBL\CommonAggregateComponents\AddressType;
use UBL\CommonAggregateComponents\CountryType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\NameType;
use UBL\UnqualifiedDataTypes\TextType;

class AddressTest extends AbstractTypeTest
{

    public function testAddress()
    {
        $country = new CountryType(identificationCode: new CodeType('DE'));
        $address = new AddressType(
            streetName: new NameType('[Seller address line 1]'),
            cityName: new NameType('[Seller city]'),
            postalZone: new TextType('12345'),
            country: $country,
        );

        $str = $this->serialize($address, [
            XmlEncoder::ROOT_NODE_NAME => 'cac:PostalAddress',
        ]);

        // add namespaces for xml validator
        $str = $this->addXMLNamespaces($str);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/assets/Address.xml', $str);
    }

    public function testDeserialize()
    {
        $str = file_get_contents(__DIR__ . '/assets/Address.xml');

        /**
         * @var  $val AddressType
         */
        $val = $this->deserialize($str, AddressType::class);

        self::assertSame('12345', $val->getPostalZone()->value);
        self::assertSame('DE', $val->getCountry()->identificationCode->value);
    }
}