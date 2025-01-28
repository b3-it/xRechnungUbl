<?php /** @noinspection PhpUnused */

namespace UBL;

use DateTimeInterface;
use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
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
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use UBL\Serializer\EmptyArrayNormalizer;
use UBL\Serializer\PrefixNameConverter;

class Builder
{
    protected ?SerializerInterface $serializer;

    public function __construct(?SerializerInterface $serializer = null)
    {
        $this->serializer = $serializer ?? $this->__createSerializer();
    }

    /**
     * @return SerializerInterface|null
     */
    public function getSerializer(): ?SerializerInterface
    {
        return $this->serializer;
    }

    public function serialize($data, array $context = []): string
    {
        return $this->getSerializer()->serialize($data, 'xml', array_merge($context, [
            AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
            XmlEncoder::FORMAT_OUTPUT => true,
            #XmlEncoder::REMOVE_EMPTY_TAGS => true
        ]));
    }

    public function deserialize(string $data, string $class, array $context = [])
    {
        return $this->getSerializer()->deserialize($data, $class, 'xml', $context);
    }

    public function serializeInvoice(Invoice $invoice, array $options = []): string
    {
        return $this->serialize($invoice, array_merge($options, [
            XmlEncoder::ROOT_NODE_NAME => Invoice::ROOT_NAME
        ]));
    }

    protected function __createSerializer(): SerializerInterface
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

        $prefixNameConverter = new PrefixNameConverter($nameConverter, $extractor, [
            DateTimeInterface::class => CommonBasicComponents::PREFIX
        ], [
            // udt are used as cbc
            UnqualifiedDataTypes::class => CommonBasicComponents::PREFIX,
            CommonBasicComponents::class => CommonBasicComponents::PREFIX,
            CommonAggregateComponents::class => CommonAggregateComponents::PREFIX,
        ]);

        $objectNormalizer = new ObjectNormalizer($classMetadataFactory, $prefixNameConverter, null, $extractor);
        $encoders = [new XmlEncoder()];
        $normalizers = [
            new EmptyArrayNormalizer(),
            new DateTimeNormalizer(),
            new DateTimeZoneNormalizer(),
            new DateIntervalNormalizer(),
            new CustomNormalizer(),
            new BackedEnumNormalizer(),
            new ArrayDenormalizer(),
            $objectNormalizer,
        ];
        return new Serializer($normalizers, $encoders);
    }

}