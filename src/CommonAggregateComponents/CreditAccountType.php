<?php


namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\IdentifierType;

class CreditAccountType
{
    public function __construct(
        #[SerializedName('AccountID')]
        public IdentifierType $accountID
    )
    {
        #$this->setPrefix(CommonAggregateComponents::PREFIX);
    }
}