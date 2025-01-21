<?php


namespace UBL\UnqualifiedDataTypes;

use UBL\CCTS;

class AmountType extends CCTS\AmountType
{
    public function __construct(float $value, string $currencyID, ?string $currencyCodeListVersionID = null)
    {
        parent::__construct($value, $currencyID, $currencyCodeListVersionID);
    }
}