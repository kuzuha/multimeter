<?php

namespace Multimeter\Constraint;

use Exception;
use InvalidArgumentException;
use PHPUnit_Framework_Constraint;
use PHPUnit_Framework_Constraint_And;
use PHPUnit_Framework_Constraint_Exception;
use PHPUnit_Framework_Constraint_ExceptionCode;
use PHPUnit_Framework_Constraint_ExceptionMessage;

class ThrowsException extends PHPUnit_Framework_Constraint
{
    /**
     * @var \PHPUnit_Framework_Constraint
     */
    protected $constraint;

    /**
     * @param string|array $expectedException
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($expectedException)
    {
        if (is_string($expectedException)) {
            $expectedException = ['class' => $expectedException];
        } else if (!is_array($expectedException)) {
            throw new InvalidArgumentException('Argument must be string or array.');
        }

        $constraintList = [];

        if (isset($expectedException['class'])) {
            $constraintList[] = new PHPUnit_Framework_Constraint_Exception($expectedException['class']);
        }

        if (isset($expectedException['message'])) {
            $constraintList[] = new PHPUnit_Framework_Constraint_ExceptionMessage($expectedException['message']);
        }

        if (isset($expectedException['code'])) {
            $constraintList[] = new PHPUnit_Framework_Constraint_ExceptionCode($expectedException['code']);
        }

        if (empty($constraintList)) {
            throw new InvalidArgumentException('Can\'t find any constraints.');
        }

        $this->constraint = new PHPUnit_Framework_Constraint_And();
        $this->constraint->setConstraints($constraintList);
    }

    public function evaluate($other, $description = '', $returnResult = false)
    {
        try {
            /** @var $other callable */
            $other();
        } catch (Exception $exception) {
            return $this->constraint->evaluate($exception, $description, $returnResult);
        }

        if ($returnResult) {
            return false;
        }

        $this->fail($other, $description);
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return $this->constraint->toString();
    }
}
