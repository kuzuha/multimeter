<?php

namespace Multimeter\Constraint;

class BetweenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider evaluateProvider
     */
    public function testEvaluate($expected, $other, $min, $max)
    {
        $constraint = new Between($min, $max);
        $this->assertSame($expected, $constraint->evaluate($other, '', true));
    }

    public function evaluateProvider()
    {
        return [
            [true, 1, 1, 1],
            [true, 1, 1, 1.01],
            [false, 1, 1.01, 2],
            [false, 1, 0, 0.99999],
            [true, 'b', 'b', 'c'],
            [false, 'd', 'b', 'c'],
            [false, 'a', 'b', 'c'],
        ];
    }

    public function testToString()
    {
        $this->assertSame('is between 10 and 100', (new Between(10, 100))->toString());
    }
}
