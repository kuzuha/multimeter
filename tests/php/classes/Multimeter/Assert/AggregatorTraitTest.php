<?php

namespace Multimeter\Assert;

class AggregatorTraitTest extends \PHPUnit_Framework_TestCase
{
    use AggregatorTrait;

    public function testAggregator()
    {
        $aggregator = $this->aggregator();
        $this->assertInstanceOf(__NAMESPACE__ . '\\Aggregator', $aggregator);
        $this->assertNotSame($aggregator, $other = $this->aggregator());
        $aggregator->evaluate();
        $other->evaluate();
    }
}
