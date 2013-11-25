<?php

namespace Multimeter\Assert;

use BadMethodCallException;
use Exception;
use PHPUnit_Framework_AssertionFailedError;
use PHPUnit_Framework_ExpectationFailedException;

/**
 * Class Aggregator
 * @package Multimeter\Assert
 *
 * @method \Multimeter\Assert\Aggregator assertArrayHasKey($key, $array, $message = '')
 * @method \Multimeter\Assert\Aggregator assertArrayNotHasKey($key, $array, $message = '')
 * @method \Multimeter\Assert\Aggregator assertContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true)
 * @method \Multimeter\Assert\Aggregator assertAttributeContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true)
 * @method \Multimeter\Assert\Aggregator assertNotContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true)
 * @method \Multimeter\Assert\Aggregator assertAttributeNotContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true)
 * @method \Multimeter\Assert\Aggregator assertContainsOnly($type, $haystack, $isNativeType = null, $message = '')
 * @method \Multimeter\Assert\Aggregator assertContainsOnlyInstancesOf($classname, $haystack, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeNotContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
 * @method \Multimeter\Assert\Aggregator assertCount($expectedCount, $haystack, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotCount($expectedCount, $haystack, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeNotCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertEquals($expected, $actual, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
 * @method \Multimeter\Assert\Aggregator assertAttributeEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
 * @method \Multimeter\Assert\Aggregator assertNotEquals($expected, $actual, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
 * @method \Multimeter\Assert\Aggregator assertAttributeNotEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
 * @method \Multimeter\Assert\Aggregator assertEmpty($actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotEmpty($actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeNotEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertGreaterThan($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeGreaterThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertGreaterThanOrEqual($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeGreaterThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertLessThan($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeLessThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertLessThanOrEqual($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeLessThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertFileEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
 * @method \Multimeter\Assert\Aggregator assertFileNotEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
 * @method \Multimeter\Assert\Aggregator assertStringEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
 * @method \Multimeter\Assert\Aggregator assertStringNotEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
 * @method \Multimeter\Assert\Aggregator assertFileExists($filename, $message = '')
 * @method \Multimeter\Assert\Aggregator assertFileNotExists($filename, $message = '')
 * @method \Multimeter\Assert\Aggregator assertTrue($condition, $message = '')
 * @method \Multimeter\Assert\Aggregator assertFalse($condition, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotNull($actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNull($actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertClassHasAttribute($attributeName, $className, $message = '')
 * @method \Multimeter\Assert\Aggregator assertClassNotHasAttribute($attributeName, $className, $message = '')
 * @method \Multimeter\Assert\Aggregator assertClassHasStaticAttribute($attributeName, $className, $message = '')
 * @method \Multimeter\Assert\Aggregator assertClassNotHasStaticAttribute($attributeName, $className, $message = '')
 * @method \Multimeter\Assert\Aggregator assertObjectHasAttribute($attributeName, $object, $message = '')
 * @method \Multimeter\Assert\Aggregator assertObjectNotHasAttribute($attributeName, $object, $message = '')
 * @method \Multimeter\Assert\Aggregator assertSame($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotSame($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeNotSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertInstanceOf($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeInstanceOf($expected, $attributeName, $classOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotInstanceOf($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeNotInstanceOf($expected, $attributeName, $classOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertInternalType($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeInternalType($expected, $attributeName, $classOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotInternalType($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertAttributeNotInternalType($expected, $attributeName, $classOrObject, $message = '')
 * @method \Multimeter\Assert\Aggregator assertRegExp($pattern, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotRegExp($pattern, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertSameSize($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertNotSameSize($expected, $actual, $message = '')
 * @method \Multimeter\Assert\Aggregator assertStringMatchesFormat($format, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertStringNotMatchesFormat($format, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertStringMatchesFormatFile($formatFile, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertStringNotMatchesFormatFile($formatFile, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertStringStartsWith($prefix, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertStringStartsNotWith($prefix, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertStringEndsWith($suffix, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertStringEndsNotWith($suffix, $string, $message = '')
 * @method \Multimeter\Assert\Aggregator assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')
 * @method \Multimeter\Assert\Aggregator assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')
 * @method \Multimeter\Assert\Aggregator assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')
 * @method \Multimeter\Assert\Aggregator assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')
 * @method \Multimeter\Assert\Aggregator assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')
 * @method \Multimeter\Assert\Aggregator assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')
 * @method \Multimeter\Assert\Aggregator assertEqualXMLStructure(\DOMElement $expectedElement, \DOMElement $actualElement, $checkAttributes = false, $message = '')
 * @method \Multimeter\Assert\Aggregator assertSelectCount($selector, $count, $actual, $message = '', $isHtml = true)
 * @method \Multimeter\Assert\Aggregator assertSelectRegExp($selector, $pattern, $count, $actual, $message = '', $isHtml = true)
 * @method \Multimeter\Assert\Aggregator assertSelectEquals($selector, $content, $count, $actual, $message = '', $isHtml = true)
 * @method \Multimeter\Assert\Aggregator assertTag($matcher, $actual, $message = '', $isHtml = true)
 * @method \Multimeter\Assert\Aggregator assertNotTag($matcher, $actual, $message = '', $isHtml = true)
 * @method \Multimeter\Assert\Aggregator assertThat($value, \PHPUnit_Framework_Constraint $constraint, $message = '')
 * @method \Multimeter\Assert\Aggregator assertJson($expectedJson, $message = '')
 * @method \Multimeter\Assert\Aggregator assertJsonStringEqualsJsonString($expectedJson, $actualJson, $message = '')
 * @method \Multimeter\Assert\Aggregator assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = '')
 * @method \Multimeter\Assert\Aggregator assertJsonStringEqualsJsonFile($expectedFile, $actualJson, $message = '')
 * @method \Multimeter\Assert\Aggregator assertJsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = '')
 * @method \Multimeter\Assert\Aggregator assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')
 * @method \Multimeter\Assert\Aggregator assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')
 * @method \Multimeter\Assert\Aggregator assertThrowsException($expectedException, callable $callback, $message = '')
 */
class Aggregator
{
    protected $assertClassName;
    /**
     * @var array
     */
    protected $assertionList = array();

    public function __construct($assertClassName = '\\PHPUnit_Framework_Assert')
    {
        $this->assertClassName = $assertClassName;
    }

    public function __call($method, array $params)
    {
        if (!preg_match('/^assert.+/', $method)) {
            throw new BadMethodCallException(sprintf('%s is not a valid assertion method.', $method));
        }
        $this->assertionList[] = [$method, $params];

        return $this;
    }

    public function evaluate($message = '')
    {
        $messageList = [];

        foreach ($this->assertionList as $assertion) {
            list($method, $params) = $assertion;

            try {
                call_user_func_array([$this->assertClassName, $method], $params);
            } catch (PHPUnit_Framework_ExpectationFailedException $exception) {
                $str     = $exception->toString();
                $failure = $exception->getComparisonFailure();
                if ($failure) {
                    $str .= "\n" . $failure->getDiff();
                }
                $messageList[] = $str;
            } catch (PHPUnit_Framework_AssertionFailedError $exception) {
                $messageList[] = $exception->toString();
            } catch (Exception $exception) {
                $messageList[] = $exception->getMessage();
            }
        }

        if ($messageList) {
            if ($message) {
                array_unshift($messageList, $message);
            }
            throw new PHPUnit_Framework_AssertionFailedError(implode("\n\n", $messageList));
        }
    }
}
