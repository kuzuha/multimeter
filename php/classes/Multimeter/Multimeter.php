<?php

namespace Multimeter;

use Multimeter\Assert\AggregatorTrait;
use Multimeter\Assert\ThrowsExceptionTrait;
use Multimeter\Constraint\NumericConstraintTrait;

trait Multimeter
{
    use AggregatorTrait;
    use NumericConstraintTrait;
    use ThrowsExceptionTrait;
}
