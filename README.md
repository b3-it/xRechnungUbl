# XRechnung UBL

A PHP library for building, serializing, and deserializing **UBL 2.1 Invoices** compliant with **[XRechnung](https://xeinkauf.de/xrechnung/)** and **[PEPPOL BIS Billing 3.0](https://docs.peppol.eu/poacc/billing/3.0/)**. It provides a complete, type-hinted, object-oriented model of the UBL Common Aggregate Components (CAC), Common Basic Components (CBC), and Unqualified Data Types (UDT), and uses the Symfony Serializer to convert between PHP objects and UBL/XML.

## Features

- Object model covering the UBL 2.1 `Invoice` document, including Common Aggregate Components, Common Basic Components, Unqualified Data Types, and Core Component Type Schema (CCTS) types.
- Serialization of PHP objects into UBL-conformant XML and deserialization of XML back into PHP objects.
- Sensible defaults for XRechnung, including `CustomizationID` (versioned for XRechnung 3.0 CIUS/extension) and the PEPPOL `ProfileID`.
- Enums for common PEPPOL/UNCL code lists, e.g. `AllowanceReasonCode`, `ChargeReasonCode`, `PaymentMeansCode`, `TaxCategoryCode`, `VatexCode`.
- Bundled reference assets: UBL 2.1 XSD schemas and the EN 16931 / XRechnung XSLT validation stylesheets (`assets/`).
- Fluent `add*()` helpers on collection properties (e.g. `addInvoiceLine()`, `addTaxTotal()`, `addPaymentTerms()`) for convenient invoice construction.

## Requirements

- PHP `^8.1`
- PHP extensions: `ext-dom`, `ext-xml`, `ext-xsl`
- `symfony/property-access`, `symfony/property-info`, `symfony/serializer` (`^6.4 || ^7.1 || ^8.0`)
- `phpdocumentor/reflection-docblock` `^5.3`

## Installation

Install via [Composer](https://getcomposer.org/):

```bash
composer require b3it/x-rechnung-ubl
```

## Usage

### Building an invoice

```php
use UBL\Builder;
use UBL\Invoice;
use UBL\CommonAggregateComponents\MonetaryTotalType;
use UBL\UnqualifiedDataTypes\AmountType;
use UBL\UnqualifiedDataTypes\IdentifierType;

$invoice = new Invoice();
$invoice->setId(new IdentifierType('RE-2026-0001'));
$invoice->setIssueDate(new DateTime('2026-07-06'));

$legalMonetaryTotal = new MonetaryTotalType();
$legalMonetaryTotal->setLineExtensionAmount(new AmountType(314.86, 'EUR'));
$legalMonetaryTotal->setTaxExclusiveAmount(new AmountType(314.86, 'EUR'));
$legalMonetaryTotal->setTaxInclusiveAmount(new AmountType(336.90, 'EUR'));
$legalMonetaryTotal->setPayableAmount(new AmountType(336.90, 'EUR'));
$invoice->setLegalMonetaryTotal($legalMonetaryTotal);

$builder = new Builder();
$xml = $builder->serializeInvoice($invoice);

echo $xml;
```

### Parsing an existing UBL invoice

```php
use UBL\Builder;
use UBL\Invoice;

$builder = new Builder();
$xmlString = file_get_contents('invoice.xml');

/** @var Invoice $invoice */
$invoice = $builder->deserialize($xmlString, Invoice::class);

echo $invoice->getLegalMonetaryTotal()->getPayableAmount()->getValue();
```

### Default XRechnung/PEPPOL identifiers

`UBL\Invoice` exposes constants used to populate the mandatory profile identifiers for XRechnung 3.0:

```php
Invoice::XR_CIUS_ID;       // urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0
Invoice::XR_EXTENSION_ID;  // ...#conformant#urn:xeinkauf.de:kosit:extension:xrechnung_3.0
Invoice::PROFILE_ID;       // urn:fdc:peppol.eu:2017:poacc:billing:01:1.0
```

## Reference assets

The `assets/` directory bundles the official reference schemas and validation stylesheets used to check invoices for standards compliance:

- `assets/common/` and `assets/maindoc/` — UBL 2.1 XSD schemas (OASIS).
- `assets/validation/EN16931-UBL-validation.xsl` — EN 16931 (European Norm) Schematron-generated validation.
- `assets/validation/XRechnung-UBL-validation.xsl` — XRechnung-specific validation rules.

These can be used with any standard XML/XSLT tooling (e.g. PHP's `ext-xsl` or `ext-dom`) to validate generated invoices against the XRechnung and EN 16931 rule sets.

## Development

Install dependencies and run the test suite with PHPUnit:

```bash
composer install
vendor/bin/phpunit
```

The test suite (`tests/`) includes round-trip serialization/deserialization tests against sample UBL invoices in `tests/assets/`.

## License

This project is licensed under the [Open Software License 3.0 (OSL-3.0)](LICENSE).
