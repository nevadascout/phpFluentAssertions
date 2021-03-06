<?php

require_once __DIR__ . "/../../../src/FluentAssertionsTestCase.php";

class BeStringTest extends FluentAssertionsTestCase
{
    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected true to be of type string
     */
    public function testBool()
    {
        $this->assert(true)->should()->beString();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected 1 to be of type string
     */
    public function testIntOne()
    {
        $this->assert(1)->should()->beString();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected 3.14 to be of type string
     */
    public function testFloat()
    {
        $this->assert(3.14)->should()->beString();
    }

    public function testString()
    {
        $this->assert("nevada")->should()->beString();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected array to be of type string
     */
    public function testArray()
    {
        $this->assert(array("1st", "2nd"))->should()->beString();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected null to be of type string
     */
    public function testNull()
    {
        $this->assert(null)->should()->beString();
    }

    // TODO -- Handle testing resources
    // public function testResource()
    // {
    //     $this->assert(null)->should()->be(null);
    // }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected callable to be of type string
     */
    public function testCallable()
    {
        $data = function() { return "test"; };
        $this->assert($data)->should()->beString();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected object to be of type string
     */
    public function testObject()
    {
        $data = new stdClass();
        $this->assert($data)->should()->beString();
    }
}
