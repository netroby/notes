<?php
class HelloWorldTest extends PHPUnit_Framework_TestCase
{

    public function testHelloWorld()
    {
        $this->assertNotEmpty(phpversion());
    }
}
