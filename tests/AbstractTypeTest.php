<?php

namespace UBL\Tests;

use DOMDocument;
use PHPUnit\Framework\TestCase;
use UBL\Builder;
use UBL\CommonAggregateComponents;
use UBL\CommonBasicComponents;

abstract class AbstractTypeTest extends TestCase
{
    protected Builder $builder;

    protected function serialize($data, array $context = []): string
    {
        return $this->builder->serialize($data, $context);
    }

    protected function addXMLNamespaces(string $xml): string
    {
        $xml_doc = new DOMDocument();
        $xml_doc->formatOutput = true;
        $xml_doc->preserveWhiteSpace = false;
        $xml_doc->loadXML($xml);
        // set the XML namespace to work with XSL
        $xml_doc->documentElement->setAttribute('xmlns:' . CommonBasicComponents::PREFIX, CommonBasicComponents::NS);
        $xml_doc->documentElement->setAttribute('xmlns:' . CommonAggregateComponents::PREFIX, CommonAggregateComponents::NS);
        // reload XML to rebuilt namespace
        return $xml_doc->saveXML();
    }

    protected function deserialize($data, string $class, array $context = [])
    {
        return $this->builder->deserialize($data, $class, $context);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->builder = new Builder();
    }

}