<?php

require_once __DIR__ . "/../../../src/FluentAssertionsTestCase.php";

class NotEndWithTest extends FluentAssertionsTestCase
{
    public function testStringDoesNotEndWithString()
    {
        $this->assert("nevada")->should()->notEndWith("scout");
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid: Value provided for 'expected' parameter was empty or null
     */
    public function testEmptyStringThrowsException()
    {
        $this->assert("nevada")->should()->notEndWith("");
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid: Value provided for 'result' parameter was empty or null
     */
    public function testEmptyStringResult()
    {
        $this->assert("")->should()->notEndWith("ada");
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid: Value provided for 'expected' parameter was empty or null
     */
    public function testNullThrowsException()
    {
        $this->assert("nevada")->should()->notEndWith(null);
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid type: wanted type "string" but was actually type "int"
     */
    public function testIntThrowsException()
    {
        $this->assert(1)->should()->notEndWith("1");
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid type: wanted type "string" but was actually type "float"
     */
    public function testFloatThrowsException()
    {
        $this->assert(1.0)->should()->notEndWith("1.0");
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid type: wanted type "string" but was actually type "array"
     */
    public function testArrayThrowsException()
    {
        $this->assert(array("1st", "2nd"))->should()->notEndWith("1st");
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid: Value provided for 'result' parameter was empty or null
     */
    public function testNullResultThrowsException()
    {
        $this->assert(null)->should()->notEndWith("null");
    }

    // TODO -- Handle resources
    // public function testResourceThrowsException()
    // {
    //     $this->setExpectedException("InvalidArgumentException");
    //     $this->assert()->should()->notEndWith();
    // }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid type: wanted type "string" but was actually type "callable"
     */
    public function testCallableThrowsException()
    {
        $this->assert(function() { return "test"; })->should()->notEndWith("test");
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Invalid type: wanted type "string" but was actually type "object"
     */
    public function testObjectThrowsException()
    {
        $this->assert(new stdClass())->should()->notEndWith("stdClass");
    }
}
