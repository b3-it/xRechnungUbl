<?php

use PHPUnit\Framework\TestCase;

use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\SerializedPath;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\Mapping\Loader\LoaderChain;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;
use Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\UidNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use UBL\CommonAggregateComponents\MonetaryTotalType;
use UBL\UnqualifiedDataTypes\AmountType;

class TestData {

    /**
     * @var string[]
     */
    #[SerializedName('PartyName')]
    public array $name = [];
}


class EncodeTest extends TestCase
{

    public function testDecode()
    {
        $str = '<cac:party xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2"
            xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2">
            <cac:PartyName>
                <cbc:Name>[Seller trading name A]</cbc:Name>
            </cac:PartyName>
            <cac:PartyName>
                <cbc:Name>[Seller trading name B]</cbc:Name>
            </cac:PartyName>
        </cac:party>';

        $encoder = new XmlEncoder();
        $data = $encoder->decode($str, 'xml');

        $this->assertArrayHasKey('cac:PartyName', $data);
        $this->assertCount(2, $data['cac:PartyName']);
        $this->assertSame('[Seller trading name A]', $data['cac:PartyName'][0]['cbc:Name']);
        $this->assertSame('[Seller trading name B]', $data['cac:PartyName'][1]['cbc:Name']);

        $newStr = $encoder->encode($data, 'xml');
        $this->assertStringContainsString('[Seller trading name A]', $newStr);
        $this->assertStringContainsString('[Seller trading name B]', $newStr);
    }

    public function testEncode()
    {
        $data = new TestData;
        $data->name = ['A', 'B'];

        $str = $this->getSerializer()->serialize($data, 'xml');
        $this->assertXmlStringEqualsXmlString(
            '<response><PartyName>A</PartyName><PartyName>B</PartyName></response>',
            $str
        );
    }

    protected function getSerializer(): SerializerInterface
    {

        $loaders = new LoaderChain([
            new AttributeLoader()
        ]);

        $classMetadataFactory = new ClassMetadataFactory($loaders);
        $nameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $docExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();

        $extractor = new PropertyInfoExtractor([], [
            $docExtractor,
            $reflectionExtractor,
            new ConstructorExtractor([
                $docExtractor,
                $reflectionExtractor
            ])
        ], [], [], [$reflectionExtractor]);

        $objectNormalizer = new ObjectNormalizer($classMetadataFactory, $nameConverter, null, $extractor);
        $encoders = [new XmlEncoder()];
        $normalizers = [
            new DateTimeNormalizer(),
            new DateTimeZoneNormalizer(),
            new DateIntervalNormalizer(),
            new UidNormalizer(),
            new CustomNormalizer(),
            new BackedEnumNormalizer(),
            new ArrayDenormalizer(),
            $objectNormalizer,
        ];
        return new Serializer($normalizers, $encoders);
    }
}