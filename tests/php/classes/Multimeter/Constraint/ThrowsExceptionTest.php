<?php

namespace Multimeter\Constraint;

use DomainException;

class ThrowsExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider evaluateDataProvider
     */
    public function testEvaluate($expected, callable $callbackOther, $exception, $message)
    {
        $this->assertSame($expected, (new ThrowsException($exception))->evaluate($callbackOther, '', true), $message);
    }

    public function testToString()
    {
        $expected  = 'exception of type "DomainException" and exception message contains  and exception code is ';
        $exception = ['class' => 'DomainException', 'message' => 'foo bar', 'code' => 100];
        $actual    = (new ThrowsException($exception))->toString();
        $this->assertSame($expected, $actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Can't find any constraints.
     */
    public function testInvalidArguments()
    {
        new ThrowsException([]);
    }

    public function evaluateDataProvider()
    {
        $callback = function () {
            throw new DomainException('foo bar', 100);
        };

        return [
            [true, $callback, 'DomainException', 'valid string'],
            [false, $callback, 'BadFunctionCallException', 'invalid string'],
            [true, $callback, ['class' => 'DomainException', 'message' => 'foo bar', 'code' => 100], 'valid array'],
            [false, $callback, ['class' => 'BadFunctionCallException', 'message' => 'foo bar', 'code' => 100], 'invalid class'],
            [false, $callback, ['class' => 'DomainException', 'message' => 'foo bar', 'code' => 200], 'invalid code'],
            [false, $callback, ['class' => 'DomainException', 'message' => 'bar baz', 'code' => 100], 'invalid message'],
        ];
    }
}
