<?php

use Elchroy\OSE\Evangelist;
use Elchroy\OSE\EvangelistStatus;

class EvangelistStatusTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->status = new EvangelistStatus('unicodeveloper');
    }

    public function testGetStatusFunctionWorks()
    {
        $expectedStatus = 'Yeah, I crown you Senior Evangelist. Thanks for making the world a better place';

        $this->assertEquals($expectedStatus, $this->status->getStatus());
    }
}
