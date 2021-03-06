<?php

require_once __DIR__ . "/../../../src/FluentAssertionsTestCase.php";

class BeNullTest extends FluentAssertionsTestCase
{
    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected true to be of type null
     */
    public function testBool()
    {
        $this->assert(true)->should()->beNull();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected 1 to be of type null
     */
    public function testIntOne()
    {
        $this->assert(1)->should()->beNull();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected 3.14 to be of type null
     */
    public function testFloat()
    {
        $this->assert(3.14)->should()->beNull();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected "nevada" to be of type null
     */
    public function testString()
    {
        $this->assert("nevada")->should()->beNull();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected array to be of type null
     */
    public function testArray()
    {
        $this->assert(array("1st", "2nd"))->should()->beNull();
    }

    public function testNull()
    {
        $this->assert(null)->should()->beNull();
    }

    // TODO -- Handle testing resources
    // public function testResource()
    // {
    //     $this->assert(null)->should()->be(null);
    // }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected callable to be of type null
     */
    public function testCallable()
    {
        $data = function() { return "test"; };
        $this->assert($data)->should()->beNull();
    }

    /**
     * @expectedException        FluentAssertionException
     * @expectedExceptionMessage Expected object to be of type null
     */
    public function testObject()
    {
        $data = new stdClass();
        $this->assert($data)->should()->beNull();
    }
}
