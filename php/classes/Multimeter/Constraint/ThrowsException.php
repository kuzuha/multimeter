<?php

namespace Multimeter\Constraint;

use Exception;
use InvalidArgumentException;
use PHPUnit_Framework_Constraint;

class ThrowsException extends PHPUnit_Framework_Constraint
{
    /**
     * @var \PHPUnit_Framework_Constraint
     */
    protected $constraint = null;
    protected $expectedException = [];

    /**
     * @param string|array $expectedException
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($expectedException)
    {
        parent::__construct();
        if (empty($expectedException)) {
            
        } if (is_string($expectedException)) {
            $expectedException = ['class' => $expectedException];
        } else if (!is_array($expectedException)) {
            throw new InvalidArgumentException('Argument must be string or array.');
        }

        if (isset($expectedException['class'])) {
            $this->expectedException['class'] = $expectedException['class'];
        }

        if (isset($expectedException['message'])) {
            $this->expectedException['message'] = $expectedException['message'];
        }

        if (isset($expectedException['code'])) {
            $this->expectedException['code'] = $expectedException['code'];
        }
        ksort($this->expectedException);
        
        $this->constraint = new \PHPUnit_Framework_Constraint_IsEqual($this->expectedException);
    }

    public function evaluate($other, $description = '', $returnResult = false)
    {
        try {
            /** @var $other callable */
            $other();
        } catch (Exception $exception) {
            $error = [];
            if (empty($this->expectedException) || isset($this->expectedException['class'])) {
                $error['class'] = get_class($exception);
            }
            if (empty($this->expectedException) || isset($this->expectedException['code'])) {
                $error['code'] = $exception->getCode();
            }
            if (empty($this->expectedException) || isset($this->expectedException['message'])) {
                $error['message'] = $exception->getMessage();
            }
            ksort($error);
            return $this->constraint->evaluate($error, $description, $returnResult);
        }

        if ($this->expectedException) {
            if ($returnResult) {
                return false;
            }

            $this->fail($other, $description);
        }

        if ($returnResult) {
            return true;
        }
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        if ($this->expectedException) {
            return $this->constraint->toString();
        }

        return "doesn't throws Exception";
    }
}
