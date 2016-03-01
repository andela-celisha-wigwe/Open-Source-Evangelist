<?php

use Elchroy\OSE\OSEException;
use Elchroy\OSE\NoMethodException;

class OSEExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testCatchUncaughtExceptions()
    {
        $exception = new OSEException('There was an error');
        $this->assertEquals('There was an error', $exception->catchExceptions());
    }
}
