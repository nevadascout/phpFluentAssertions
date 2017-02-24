<?php
/*---------------------------------------------------------------------------------------------
 *  Copyright (c) Hvy Industries. All rights reserved.
 *  Licensed under the MIT License. See "LICENSE" in the project root for license information.
 *  "HVY", "HVY Industries" and "Hvy Industries" are trading names of JCKD (UK) Ltd
 *
 *  PHP Fluent Assertions was written by nevada_scout (Joe Cotton)
 *  Based on the Fluent Assertions for .NET created by Dennis Doomen
 *--------------------------------------------------------------------------------------------*/

require "includes.php";

abstract class FluentAssertionsTestCase extends PHPUnit_Framework_TestCase
{
    private $result;
    private $resultType;

    private $expected;
    private $expectedType;

    private $reason;
    private $negativeComparison = false;

    public function assert($result)
    {
        $this->result = $result;
        $this->resultType = TypeChecker::getType($result);

        return $this;
    }

    public function should()
    {
        return $this;
    }


    // Generic
    public function be($expected, $reason = null)
    {
        $this->expected = $expected;
        $this->expectedType = TypeChecker::getType($expected);
        $this->reason = $reason;

        if ($this->result === $this->expected) {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function notBe($expected, $reason = "")
    {
        $this->expected = $expected;
        $this->expectedType = TypeChecker::getType($expected);
        $this->reason = $reason;

        $this->negativeComparison = true;

        if ($this->result !== $this->expected) {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }


    // Booleans

    public function beTrue($reason = "")
    {
        $this->expected = true;
        $this->expectedType = TypeChecker::getType($this->expected);
        $this->reason = $reason;

        if ($this->result === $this->expected) {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function notBeTrue($reason = "")
    {
        $this->expected = true;
        $this->expectedType = TypeChecker::getType($this->expected);
        $this->reason = $reason;

        $this->negativeComparison = true;

        if ($this->result !== $this->expected) {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function beFalse($reason = "")
    {
        $this->expected = false;
        $this->expectedType = TypeChecker::getType($this->expected);
        $this->reason = $reason;

        if ($this->result === $this->expected) {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function notBeFalse($reason = "")
    {
        $this->expected = false;
        $this->expectedType = TypeChecker::getType($this->expected);
        $this->reason = $reason;

        $this->negativeComparison = true;

        if ($this->result !== $this->expected) {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }


    // Type Checking

    public function beBool($reason = "")
    {
        $this->expected = "of type bool";
        $this->expectedType = "type";
        $this->reason = $reason;

        if ($this->resultType === "bool") {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function notBeBool($reason = "")
    {
        $this->expected = "of type bool";
        $this->expectedType = "type";
        $this->reason = $reason;

        $this->negativeComparison = true;

        if ($this->resultType !== "bool") {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function beInt($reason = "")
    {
        $this->expected = "of type int";
        $this->expectedType = "type";
        $this->reason = $reason;

        if ($this->resultType === "int") {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function notBeInt($reason = "")
    {
        $this->expected = "of type int";
        $this->expectedType = "type";
        $this->reason = $reason;

        $this->negativeComparison = true;

        if ($this->resultType !== "int") {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function beFloat($reason = "")
    {
        $this->expected = "of type float";
        $this->expectedType = "type";
        $this->reason = $reason;

        if ($this->resultType === "float") {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function notBeFloat($reason = "")
    {
        $this->expected = "of type float";
        $this->expectedType = "type";
        $this->reason = $reason;

        $this->negativeComparison = true;

        if ($this->resultType !== "float") {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function beString($reason = "")
    {
        $this->expected = "of type string";
        $this->expectedType = "type";
        $this->reason = $reason;

        if ($this->resultType === "string") {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function notBeString($reason = "")
    {
        $this->expected = "of type string";
        $this->expectedType = "type";
        $this->reason = $reason;

        $this->negativeComparison = true;

        if ($this->resultType !== "string") {
            $this->passTest();
        } else {
            throw new FluentAssertionException($this->buildFailureReason());
        }
    }

    public function beNull($reason = "")
    {
        self::assertThat($this->result === null, self::isTrue(), $reason);
    }

    public function notBeNull($reason = "")
    {
        self::assertThat($this->result !== null, self::isTrue(), $reason);
    }


    // Strings

    public function contain($needle, $reason = "")
    {
        self::checkIsType("string", $this->resultType, "result");
        self::checkIsType("string", TypeChecker::getType($needle), "expected");

        self::checkArgumentNullOrEmpty($needle, "expected");

        // TODO -- Custom reason to display strings in error instead of "true" and "false"
        if (strpos($this->result, $needle) !== false)
        {
            // Found needle within haystack
            self::assertThat(true === true, self::isTrue(), $reason);
        }
        else
        {
            self::assertThat(true === false, self::isTrue(), $reason);
        }
    }

    public function notContain($needle, $reason = "")
    {
        self::checkIsType("string", $this->resultType, "result");
        self::checkIsType("string", TypeChecker::getType($needle), "expected");

        self::checkArgumentNullOrEmpty($needle, "expected");

        // TODO -- Custom reason to display strings in error instead of "true" and "false"
        if (strpos($this->result, $needle) !== false)
        {
            // Found needle within haystack
            self::assertThat(true === false, self::isTrue(), $reason);
        }
        else
        {
            self::assertThat(true === true, self::isTrue(), $reason);
        }
    }

    public function startWith($needle, $reason = "")
    {
        self::checkIsType("string", $this->resultType, "result");
        self::checkIsType("string", TypeChecker::getType($needle), "expected");

        self::checkArgumentNullOrEmpty($needle, "expected");

        // TODO -- Custom reason to display strings in error instead of "true" and "false"
        if (strpos($this->result, $needle) === 0)
        {
            // Needle was at the start of the string
            self::assertThat(true === true, self::isTrue(), $reason);
        }
        else
        {
            self::assertThat(true === false, self::isTrue(), $reason);
        }
    }

    public function notStartWith($needle, $reason = "")
    {
        self::checkIsType("string", $this->resultType, "result");
        self::checkIsType("string", TypeChecker::getType($needle), "expected");

        self::checkArgumentNullOrEmpty($needle, "expected");

        // TODO -- Custom reason to display strings in error instead of "true" and "false"
        if (strpos($this->result, $needle) !== 0)
        {
            // Needle was not at the start of the string
            self::assertThat(true === true, self::isTrue(), $reason);
        }
        else
        {
            self::assertThat(true === false, self::isTrue(), $reason);
        }
    }

    public function endWith($needle, $reason = "")
    {
        self::checkIsType("string", $this->resultType, "result");
        self::checkIsType("string", TypeChecker::getType($needle), "expected");

        self::checkArgumentNullOrEmpty($needle, "expected");

        // TODO -- Custom reason to display strings in error instead of "true" and "false"
        if (($temp = strlen($this->result) - strlen($needle)) >= 0 && strpos($this->result, $needle, $temp) !== false)
        {
            // Needle was at the end of the string
            self::assertThat(true === true, self::isTrue(), $reason);
        }
        else
        {
            self::assertThat(true === false, self::isTrue(), $reason);
        }
    }

    public function notEndWith($needle, $reason = "")
    {
        self::checkIsType("string", $this->resultType, "result");
        self::checkIsType("string", TypeChecker::getType($needle), "expected");

        self::checkArgumentNullOrEmpty($needle, "expected");

        // TODO -- Custom reason to display strings in error instead of "true" and "false"
        if (($temp = strlen($this->result) - strlen($needle)) >= 0 && strpos($this->result, $needle, $temp) !== false)
        {
            // Needle was not at the end of the string
            self::assertThat(true === false, self::isTrue(), $reason);
        }
        else
        {
            self::assertThat(true === true, self::isTrue(), $reason);
        }
    }

    public function haveLength($length, $reason = "")
    {
        self::checkIsType("string", $this->resultType, "result");
        self::checkIsType("int", TypeChecker::getType($length), "expected");

        self::checkArgumentNullOrEmpty($length, "expected");

        self::assertThat(strlen($this->result) === $length, self::isTrue(), $reason);
    }

    public function notHaveLength($length, $reason = "")
    {
        self::checkIsType("string", $this->resultType, "result");
        self::checkIsType("int", TypeChecker::getType($length), "expected");

        self::checkArgumentNullOrEmpty($length, "expected");

        self::assertThat(strlen($this->result) !== $length, self::isTrue(), $reason);
    }


    // Arrays

    public function haveCount($count, $reason = "")
    {
        self::checkIsType("array", $this->resultType, "result");
        self::checkIsType("int", TypeChecker::getType($count), "expected");

        self::checkArgumentNullOrEmpty($count, "expected");

        self::assertThat(count($this->result) === $count, self::isTrue(), $reason);
    }

    public function notHaveCount($count, $reason = "")
    {
        self::checkIsType("array", $this->resultType, "result");
        self::checkIsType("int", TypeChecker::getType($count), "expected");

        self::checkArgumentNullOrEmpty($count, "expected");

        self::assertThat(count($this->result) !== $count, self::isTrue(), $reason);
    }

    public function containItem($needle, $reason = "")
    {
        self::checkIsType("array", $this->resultType, "result");

        $result = array_search($needle, $this->result);

        self::assertThat($result !== false, self::isTrue(), $reason);
    }

    public function notContainItem($needle, $reason = "")
    {
        self::checkIsType("array", $this->resultType, "result");

        $result = array_search($needle, $this->result);

        self::assertThat($result === false, self::isTrue(), $reason);
    }


    // Helper Functions

    private static function checkIsType($typeName, $variableType, $param)
    {
        if ($variableType !== $typeName)
        {
            throw new InvalidArgumentException("Expected type: {$typeName}, but provided '{$param}' value was type: {$variableType}");
        }
    }

    private static function checkArgumentNullOrEmpty($arg, $param)
    {
        if ($arg === null || $arg === "")
        {
            throw new InvalidArgumentException("Value provided for '{$param}' was empty or null");
        }
    }

    private function buildFailureReason()
    {
        $result = $this->result;
        $expected = $this->expected;
        $comparison = ($this->negativeComparison) ? " not " : " " ;

        // Handle true/false which would otherwise show up as "1" and "0" in the reason
        if ($this->resultType == "bool") {
            $result = ($result) ? "true" : "false";
        }
        if ($this->expectedType == "bool") {
            $expected = ($expected) ? "true" : "false";
        }

        // Handle null which would otherwise show up as "" in the reason
        if ($this->resultType == "null"
            || $this->resultType == "array"
            || $this->resultType == "callable"
            || $this->resultType == "object"
            ) {
            $result = $this->resultType;
        }
        if ($this->expectedType == "null"
            || $this->expectedType == "array"
            || $this->expectedType == "callable"
            || $this->expectedType == "object"
            ) {
            $expected = $this->expectedType;
        }

        // Handle strings
        if ($this->resultType == "string") {
            $result = "\"" . $result . "\"";
        }
        if ($this->expectedType == "string") {
            $expected = "\"" . $expected . "\"";
        }

        $reason = "Expected {$result} to{$comparison}be {$expected}";

        if ($this->reason != null) {
            if ($this->startsWith($this->reason, "because") || $this->startsWith($this->reason, "Because")) {
                $reason .= " {$this->reason}";
            } else {
                $reason .= " because {$this->reason}";
            }
        }

        return $reason;
    }

    private function startsWith($haystack, $needle)
    {
        // Search backwards through the string
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }

    private function passTest()
    {
        $this->assertTrue(true);
    }
}