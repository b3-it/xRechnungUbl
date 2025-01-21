<?php

namespace UBL\Serializer;

use ReflectionClass;
use ReflectionException;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Serializer\NameConverter\AdvancedNameConverterInterface;

class PrefixNameConverter implements AdvancedNameConverterInterface
{
    public function __construct(
        protected AdvancedNameConverterInterface $decorated,
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

        $types = $this->typeExtractor->getTypes($class, $propertyName);

        if ($types) {
            foreach ($types as $type) {
                $prefix = $this->getPrefixByType($type);
                if ($prefix) {
                    return $prefix;
                }
            }
        }
        return '';
    }

    /**
     * @throws ReflectionException
     */
    protected function getPrefixByType(Type $type): ?string
    {
        if ($type->getBuiltinType() == Type::BUILTIN_TYPE_OBJECT) {
            $className = $type->getClassName();
            if (isset($this->classes[$className])) {
                return $this->classes[$className] . ":";
            }
            $reflectionClass = new ReflectionClass($type->getClassName());
            $namespace = $reflectionClass->getNamespaceName();
            if (isset($this->namespaces[$namespace])) {
                return $this->namespaces[$namespace] . ":";
            }
        } else if ($type->isCollection()) {
            foreach ($type->getCollectionValueTypes() as $valueType) {
                $prefix = $this->getPrefixByType($valueType);
                if ($prefix) {
                    return $prefix;
                }
            }
        }
        return null;
    }
}