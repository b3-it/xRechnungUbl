<?php

namespace UBL\Serializer;

use ReflectionClass;
use ReflectionException;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\TypeInfo\Type;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

class PrefixNameConverter implements NameConverterInterface
{
    public function __construct(
        protected NameConverterInterface $decorated,
        protected PropertyTypeExtractorInterface $typeExtractor,
        protected array $classes = [],
        protected array $namespaces = []
    )
    {
    }

    /**
     * @throws ReflectionException
     */
    public function normalize(string $propertyName, ?string $class = null, ?string $format = null, array $context = []): string
    {
        return $this->getPrefix($propertyName, $class) . $this->decorated->normalize($propertyName, $class, $format, $context);
    }

    public function denormalize(string $propertyName, ?string $class = null, ?string $format = null, array $context = []): string
    {
        // remove xml namespaces
        $propertyName = preg_replace('/^[^:]+:/', '', $propertyName);
        return $this->decorated->denormalize($propertyName, $class, $format, $context);
    }


    /**
     * @throws ReflectionException
     */
    protected function getPrefix(string $propertyName, ?string $class = null): string
    {
        if ($class == null) {
            return '';
        }

        if ($type = $this->typeExtractor->getType($class, $propertyName)) {
            if ($prefix = $this->getPrefixByType($type)) {
                return $prefix;
            }
        }
        return '';
    }

    /**
     * @throws ReflectionException
     */
    protected function getPrefixByType(Type $type): ?string
    {
        if ($type instanceof Type\NullableType) {
            return $this->getPrefixByType($type->getWrappedType());
        } else if ($type instanceof Type\ObjectType) {
            $className = $type->getClassName();
            if (isset($this->classes[$className])) {
                return $this->classes[$className] . ":";
            }
            $reflectionClass = new ReflectionClass($className);
            $namespace = $reflectionClass->getNamespaceName();
            if (isset($this->namespaces[$namespace])) {
                return $this->namespaces[$namespace] . ":";
            }
        } else if ($type instanceof Type\CollectionType) {
            if ($prefix = $this->getPrefixByType($type->getCollectionValueType())) {
                return $prefix;
            }
        }
        return null;
    }
}