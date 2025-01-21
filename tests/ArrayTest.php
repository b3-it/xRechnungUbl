<?php

namespace UBL\Tests;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\Tests\AbstractTypeTest;

class TestData
{
    #[SerializedName("a")]
    public ?string $a = null;

    #[SerializedName("b")]
    public array $b = [];
}

class ArrayTest extends AbstractTypeTest
{

    public function testNormalize()
    {
        $data = new TestData();

        $str = $this->serialize($data, []);
        var_dump($str);
    }
}