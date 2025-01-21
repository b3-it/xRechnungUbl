<?php

namespace UBL\UnqualifiedDataTypes;

use UBL\CCTS;

class MeasureType extends CCTS\MeasureType
{
    public function __construct($value, $unitCode, $unitCodeListVersionID = null)
    {
        parent::__construct($value, $unitCode, $unitCodeListVersionID);
    }
}