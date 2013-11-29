<?php

namespace Multimeter\Constraint;

class NumericConstraintTraitTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $constraint = NumericConstraintTrait::between(10, 100);
        $this->assertInstanceOf('Multimeter\\Constraint\\Between', $constraint);
        $this->assertAttributeSame(10, 'min', $constraint);
        $this->assertAttributeSame(100, 'max', $constraint);
        $this->assertAttributeInstanceOf('PHPUnit_Framework_Constraint', 'constraint', $constraint);
    }
}
