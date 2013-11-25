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
        $this->assertSame("doesn't throws Exception", (new ThrowsException([]))->toString());

        $expected  = "is equal to Array (
    'class' => 'DomainException'
    'code' => 100
    'message' => 'foo bar'
)";
        $exception = ['class' => 'DomainException', 'message' => 'foo bar', 'code' => 100];
        $actual    = (new ThrowsException($exception))->toString();
        $this->assertSame($expected, $actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Argument must be string or array.
     */
    public function testInvalidArguments()
    {
        new ThrowsException(true);
    }

    public function evaluateDataProvider()
    {
        $callback = function () {
            throw new DomainException('foo bar', 100);
        };

        $noException = function () {
        };

        return [
            [true, $noException, [], 'no exception'],
            [true, $callback, 'DomainException', 'valid string'],
            [false, $callback, 'BadFunctionCallException', 'invalid string'],
            [true, $callback, ['class' => 'DomainException', 'message' => 'foo bar', 'code' => 100], 'valid array'],
            [false, $callback, ['class' => 'BadFunctionCallException', 'message' => 'foo bar', 'code' => 100], 'invalid class'],
            [false, $callback, ['class' => 'DomainException', 'message' => 'foo bar', 'code' => 200], 'invalid code'],
            [false, $callback, ['class' => 'DomainException', 'message' => 'bar baz', 'code' => 100], 'invalid message'],
        ];
    }
}
