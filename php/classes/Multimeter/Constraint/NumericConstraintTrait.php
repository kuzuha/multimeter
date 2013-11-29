<?php

namespace Multimeter\Constraint;

trait NumericConstraintTrait
{
    /**
     * @param int|float|string $min
     * @param int|float|string $max
     *
     * @return \Multimeter\Constraint\Between
     */
    public static function between($min, $max)
    {
        return new Between($min, $max);
    }
}
