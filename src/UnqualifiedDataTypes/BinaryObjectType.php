<?php


namespace UBL\UnqualifiedDataTypes;


use UBL\CCTS;

class BinaryObjectType extends CCTS\BinaryObjectType
{
    public function __construct(
        string $value,
        string $mimeCode,
        ?string $format = null,
        ?string $encodingCode = null,
        ?string $characterSetCode = null,
        ?string $uri = null,
        ?string $filename = null
    )
    {
        parent::__construct($value, $mimeCode, $format, $encodingCode, $characterSetCode, $uri, $filename);
    }

}