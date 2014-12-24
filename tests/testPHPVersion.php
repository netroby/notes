<?php
class HelloWorldTest extends PHPUnit_Framework_TestCase
{
    public function testHelloWorld()
    {
        $version = phpversion();
        echo " The php version is: ".$version;
        $this->assertNotEmpty($version);
    }
}
