<?php

// TODO -- This is horrible; find a solution
require_once realpath(dirname(dirname(dirname(__FILE__)))) . "/src/FluentAssertions.php";

class StringTest extends PHPUnit_FluentAssertions_TestCase
{
    public function testStringShouldContainString()
    {
        $this->Assert("nevada")->Should()->Contain("vad");
    }
    public function testStringShouldNotContainString()
    {
        $this->Assert("nevada")->Should()->NotContain("scout");
    }
}
