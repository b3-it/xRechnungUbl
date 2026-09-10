<?php

namespace UBL\Tests;

use Symfony\Component\Serializer\Attribute\SerializedName;

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

        $str = $this->serialize($data);
        $this->assertXmlStringEqualsXmlString('<response/>', $str);
    }
}