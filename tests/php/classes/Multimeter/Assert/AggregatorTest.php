<?php

namespace Multimeter\Assert;

class AggregatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Aggregator
     */
    public $aggregator;

    public function setUp()
    {
        $this->aggregator = new Aggregator($this);
    }

    public function testSuccess()
    {
        $this->aggregator
            ->assertSame(1, 1)
            ->assertNotNull(100)
            ->evaluate('success');
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage invalidMethod is not a valid assertion method.
     */
    public function testInvalidMethodCall()
    {
        $this->aggregator->invalidMethod();
    }

    public function testFail()
    {
        $expected = "aggregate test

foo
Failed asserting that 2 is identical to 1.

baz
Failed asserting that two strings are identical.
--- Expected
+++ Actual
@@ @@
- aaa 
  bbb 
- ccc 
";

        try {
            $this->aggregator
                ->assertSame(1, 2, 'foo')
                ->assertNotNull(100, 'bar')
                ->assertSame(" aaa \n bbb \n ccc ", " bbb ", 'baz')
                ->evaluate('aggregate test');
        } catch (\PHPUnit_Framework_AssertionFailedError $exception) {
            $this->assertSame($expected, $exception->toString());

            return;
        }

        $this->fail();
    }
}
