<?php

namespace UBL\Tests;


use UBL\CommonAggregateComponents\PeriodType;

class PeriodText extends AbstractTypeTest
{

    public function testSerializePeriod()
    {
        $period = new PeriodType();
        $period->setStartDate(new \DateTime());

        $str = $this->serialize($period);
        var_dump($str);
    }
}