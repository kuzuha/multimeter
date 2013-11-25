<?php

namespace Multimeter\Util;

class FunctionUtilTest extends \PHPUnit_Framework_TestCase
{
    use FunctionUtil;

    public function testCurry()
    {
        $callable = function ($a, $b) {
            return $a * $b;
        };

        $curry = self::curry($callable, [2, 3]);
        $this->assertSame($callable(2, 3), $curry());

        $curry = self::curry($callable, [6, 8]);
        $this->assertSame($callable(6, 8), $curry());

        $curry = self::curry($callable, [5]);
        $this->assertSame($callable(5, 7), $curry(7));
        $this->assertSame($callable(5, 2), $curry(2));
    }
}
