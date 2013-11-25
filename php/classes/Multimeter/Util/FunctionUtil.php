<?php

namespace Multimeter\Util;

trait FunctionUtil
{
    static function curry(callable $callback, $args = [])
    {
        return function () use ($callback, $args) {
            $realArgs = array_merge($args, func_get_args());

            return call_user_func_array($callback, $realArgs);
        };
    }
}
