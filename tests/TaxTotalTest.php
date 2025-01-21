<?php

namespace UBL\Tests;

use UBL\CommonAggregateComponents\TaxSubtotalType;
use UBL\CommonAggregateComponents\TaxTotalType;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use UBL\CommonAggregateComponents\TaxCategoryType;
use UBL\CommonAggregateComponents\TaxSchemeType;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\PercentType;

class TaxTotalTest extends AbstractTypeTest
{

    public function testSerializeTaxTotal()
    {
        $taxTotal = new TaxTotalType(
            taxAmount: new AmountType(22.04, "EUR"), taxSubtotals: [
                new TaxSubtotalType(
                    taxableAmount: new AmountType(314.86, 'EUR'),
                    taxAmount: new AmountType(22.04, 'EUR'),
                taxCategory: $this->_getTaxCategory())
            ]
        );

        $str = $this->serialize($taxTotal, [
            XmlEncoder::ROOT_NODE_NAME => 'cac:TaxTotal',
        ]);

        // add namespaces for xml validator
        $str = $this->addXMLNamespaces($str);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/assets/TaxTotal.xml', $str);
    }


    public function testSerializeTaxCategory()
    {
        $taxCategory = $this->_getTaxCategory();

        $str = $this->serialize($taxCategory, [
            XmlEncoder::ROOT_NODE_NAME => 'cac:TaxCategory',
        ]);

        // add namespaces for xml validator
        $str = $this->addXMLNamespaces($str);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/assets/TaxCategory.xml', $str);
    }

    protected function _getTaxCategory(): TaxCategoryType
    {
        return new TaxCategoryType(
            id: new IdentifierType('S'),
            percent: new PercentType(7),
            taxScheme: new TaxSchemeType(id: new IdentifierType('VAT'))
        );
    }
}