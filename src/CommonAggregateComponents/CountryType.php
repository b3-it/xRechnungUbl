<?php


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use UBL\UnqualifiedDataTypes\CodeType;
use UBL\UnqualifiedDataTypes\NameType;

class CountryType
{
    public function __construct(
        #[SerializedName('IdentificationCode')]
        public ?CodeType $identificationCode = null,
        #[SerializedName('Name')]
        public ?NameType $name = null
    )
    {
    }


    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
        $context->getValidator()->inContext($context)->validate($this->identificationCode?->value, [
            new Assert\Country(message: str_ends_with($context->getPropertyPath(), 'originCountry') ? 'BR-CL-15' : 'BR-CL-14')
        ]);
    }
}