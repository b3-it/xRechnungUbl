<?php

namespace UBL\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use UBL\CommonAggregateComponents;
use UBL\CommonAggregateComponents\InvoiceLineType;
use UBL\CommonAggregateComponents\PeriodType;
use UBL\Invoice;
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
            accountingCustomerParty: new CommonAggregateComponents\CustomerPartyType(
                party: new CommonAggregateComponents\PartyType(
                    endpointID: new IdentifierType('EndPointID', schemeID: 'schemeID'),
                    postalAddress: new CommonAggregateComponents\AddressType(
                        country: new CommonAggregateComponents\CountryType(
                            new CodeType('DE')
                        )
                    )
                )
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