<?php

namespace Multimeter\Assert;

use DomainException;
use PHPUnit_Framework_AssertionFailedError;

class ThrowsExceptionTest extends \PHPUnit_Framework_TestCase
{
    use ThrowsExceptionTrait;

    public function testAssertThrowsException()
    {
        $callback = function () {
            throw new DomainException('foo bar', 100);
        };

        $this->assertThrowsException('DomainException', $callback);

        try {
            $this->assertThrowsException('BadFunctionCallException', $callback);
        } catch (PHPUnit_Framework_AssertionFailedError $exception) {
            return;
        }

        $this->fail();
    }
}
