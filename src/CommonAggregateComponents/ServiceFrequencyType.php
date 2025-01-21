<?php /** @noinspection PhpUnused */

namespace UBL\CommonAggregateComponents;

use Symfony\Component\Serializer\Attribute\SerializedName;
use UBL\UnqualifiedDataTypes\CodeType;

class ServiceFrequencyType
{
    public function __construct(
        #[SerializedName('WeekDayCode')]
        public CodeType $weekDayCode
    )
    {}
}