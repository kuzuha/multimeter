<?php

namespace Multimeter\Constraint;

use PHPUnit_Framework_Assert;

class Between extends \PHPUnit_Framework_Constraint
{
    protected $min;
    protected $max;
    protected $constraint;

    /**
     * @param int|float|string $min
     * @param int|float|string $max
     */
    function __construct($min, $max)
    {
        $this->min        = $min;
        $this->max        = $max;
        $this->constraint = PHPUnit_Framework_Assert::logicalAnd(
            PHPUnit_Framework_Assert::greaterThanOrEqual($min),
            PHPUnit_Framework_Assert::lessThanOrEqual($max)
        );
    }

    public function evaluate($other, $description = '', $returnResult = false)
    {
        return $this->constraint->evaluate($other, $description, $returnResult);
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return sprintf('is between %s and %s', $this->min, $this->max);
    }
}
