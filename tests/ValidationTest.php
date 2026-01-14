<?php

namespace UBL\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use UBL\CommonAggregateComponents;
use UBL\CommonAggregateComponents\InvoiceLineType;
use UBL\CommonAggregateComponents\PeriodType;
use UBL\Invoice;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\IdentifierType;
use UBL\UnqualifiedDataTypes\QuantityType;

class ValidationTest extends TestCase
{
    protected ?ValidatorInterface $validator = null;
    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()->getValidator();
    }

    public function testInvalidInvoice(): void
    {
        $invoice = new Invoice(
            accountingSupplierParty: new CommonAggregateComponents\SupplierPartyType(
                party: new CommonAggregateComponents\PartyType(
                    endpointID: new IdentifierType('EndPointID', schemeID: 'schemeID'),
                    postalAddress: new CommonAggregateComponents\AddressType(
                        country: new CommonAggregateComponents\CountryType(
                            new CodeType('DE')
                        )
                    ),
                    partyTaxSchemes: [
                        new CommonAggregateComponents\PartyTaxSchemeType(
                            companyID: new IdentifierType('DE 123456789'),
                            taxScheme: new CommonAggregateComponents\TaxSchemeType(new IdentifierType('VAT'))
                        )
                    ]
                )
            ),
            accountingCustomerParty: new CommonAggregateComponents\CustomerPartyType(
                party: new CommonAggregateComponents\PartyType(
                    endpointID: new IdentifierType('EndPointID', schemeID: 'schemeID'),
                    postalAddress: new CommonAggregateComponents\AddressType(
                        country: new CommonAggregateComponents\CountryType(
                            new CodeType('DE')
                        )
                    )
                )
            ),
            legalMonetaryTotal: new CommonAggregateComponents\MonetaryTotalType(
                new AmountType(314.86, 'EUR'),
                new AmountType(314.86, 'EUR'),
                new AmountType(336.90, 'EUR'),
                new AmountType(336.90, 'EUR'),
            )
        );
        $invoice->addInvoiceLine(new InvoiceLineType(
            invoicedQuantity: new QuantityType(10.0),
            invoicePeriods: [new PeriodType(
                startDate: \DateTime::createFromFormat(CommonAggregateComponents::DATE_FORMAT, '2016-01-01'),
                endDate: \DateTime::createFromFormat(CommonAggregateComponents::DATE_FORMAT, '2016-12-31'),
            )]
        ));
        $errors = $this->validator->validate($invoice);
        $msg = [];
        foreach ($errors as $error) {
            $msg[] = $error->getMessage();
        }

        var_dump($msg);

        self::assertCount(11, $errors);
    }
}