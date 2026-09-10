<?php

namespace UBL\Tests;

use Symfony\Component\Serializer\Encoder\XmlEncoder;
use UBL\CommonAggregateComponents\MonetaryTotalType;
use UBL\UnqualifiedDataTypes\AmountType;

use UBL\Invoice;

class InvoiceTest extends AbstractTypeTest
{

    public function testInvoice()
    {
        $invoice = new Invoice;

        $legalMonetaryTotal = new MonetaryTotalType();
        $legalMonetaryTotal->setLineExtensionAmount(new AmountType(314.86, 'EUR'));
        $legalMonetaryTotal->setTaxExclusiveAmount(new AmountType(314.86, 'EUR'));
        $legalMonetaryTotal->setTaxInclusiveAmount(new AmountType(336.9, 'EUR'));
        $legalMonetaryTotal->setPayableAmount(new AmountType(336.9, 'EUR'));

        $invoice->setLegalMonetaryTotal($legalMonetaryTotal);

        $str = $this->serialize($invoice, [
            XmlEncoder::ROOT_NODE_NAME => Invoice::ROOT_NAME,
        ]);

        $expected = <<<XML
            <ubl:Invoice xmlns:ubl="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2"
                         xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2"
                         xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">
              <cac:LegalMonetaryTotal>
                <cbc:LineExtensionAmount currencyID="EUR">314.86</cbc:LineExtensionAmount>
                <cbc:TaxExclusiveAmount currencyID="EUR">314.86</cbc:TaxExclusiveAmount>
                <cbc:TaxInclusiveAmount currencyID="EUR">336.90</cbc:TaxInclusiveAmount>
                <cbc:PayableAmount currencyID="EUR">336.90</cbc:PayableAmount>
              </cac:LegalMonetaryTotal>
            </ubl:Invoice>
            XML;

        $this->assertXmlStringEqualsXmlString($expected, $str);
    }

    protected function importFileAndSerialize(string $filename): void
    {
        $str = file_get_contents($filename);

        /**
         * @var $val Invoice
         */
        $val = $this->deserialize($str, Invoice::class);

        $str2 = $this->serialize($val, [
            XmlEncoder::ROOT_NODE_NAME => Invoice::ROOT_NAME,
        ]);

        $this->assertXmlStringEqualsXmlString($str, $str2);

    }

    public function testImportUblInvoice()
    {
        $this->importFileAndSerialize(__DIR__ . '/assets/01.01a-INVOICE_ubl.xml');
    }

    public function testImportExtensionUblInvoice()
    {
        $this->importFileAndSerialize(__DIR__ . '/assets/04.01a-INVOICE_ubl.xml');
    }

    public function testImportFlatInvoiceItems()
    {
        $this->importFileAndSerialize(__DIR__ . '/assets/ubl_invoice.xml');
    }

    public function testImportSubInvoiceItems()
    {
        $this->importFileAndSerialize(__DIR__ . '/assets/ubl_invoice2.xml');
    }

    public function testImportComprehensiveInvoice()
    {
        $this->importFileAndSerialize(__DIR__ . '/assets/01.01_comprehensive_test_ubl.xml');
    }
}