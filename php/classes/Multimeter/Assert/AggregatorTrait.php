<?php

namespace Multimeter\Assert;

trait AggregatorTrait
{
    /**
     * @return Aggregator
     */
    public static function aggregator()
    {
        return new Aggregator();
    }
}
