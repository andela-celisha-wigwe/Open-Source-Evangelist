<?php

use Elchroy\OSE\Evangelist;
use Elchroy\OSE\EvangelistStatus;

class EvangelistStatusTest extends PHPUnit_Framework_TestCase
{
    // public $ranks = array(
    //         3 => '',
    //     );
    public function setUp()
    {
        $this->status = new EvangelistStatus('unicodeveloper');
    }

    public function testGetStatusFunctionWorks()
    {
        $this->assertEquals('Yeah, I crown you Senior Evangelist. Thanks for making the world a better place', $this->status->getStatus());
    }
}
