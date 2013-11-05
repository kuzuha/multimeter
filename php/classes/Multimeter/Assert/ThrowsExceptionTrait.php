<?php

namespace Multimeter\Assert;

use Multimeter\Constraint\ThrowsException;
use PHPUnit_Framework_Assert;
use PHPUnit_Util_InvalidArgumentHelper;

trait ThrowsExceptionTrait
{
    /**
     * @param string|array $expectedException
     * @param callable     $callback
     * @param string       $message
     *
     * @throws \PHPUnit_Framework_Exception
     */
    public static function assertThrowsException($expectedException, callable $callback, $message = '')
    {
        if (!is_string($expectedException) && !is_array($expectedException)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string or array');
        }

        $constraint = new ThrowsException($expectedException);
        PHPUnit_Framework_Assert::assertThat($callback, $constraint, $message);
    }
}
