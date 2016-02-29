<?php

use Elchroy\OSE\Evangelist;

class EvangelistTest extends PHPUnit_Framework_TestCase
{
    /**
     * [$data description].
     * @var [type]
     */
    public $data = [
                ['name', 'Elisha-Wigwe Chijioke O.'],
                ['repos', 2],
                ['status', 'Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist'],
                ['rank', 'Junior Evangelist'],
                ['level', 1],
            ];
    public $evangelist;

    public function setUp()
    {
        $this->evangelist = new Evangelist('andela-celisha-wigwe');
    }

    public function testMagicMethodGetCallsTheGivenFunctionOrReturnsNoMethodException()
    {
        // array_push($this->data, ['noMethod', $this->evangelist->throwNoMethodException('noMethod')]);
        foreach ($this->data as $d) {
            $method = $d[0];
            $result = $this->evangelist->$method; // The method should be called through the __get magic method.
            $this->assertEquals($d[1], $result);
        }
    }

    /**
     * @expectedException Elchroy\OSE\NoMethodException
     * @expectedExceptionMessage Method Error: 'noStatus' : andela-celisha-wigwe may not have this feature.
     *
     * @return [type] [description]
     */
    public function testGetMagicMethodThrowsExceptionWhenTheMethodDoesNotExist()
    {
        $this->evangelist->noStatus;
    }

    public function testCallMagicMethodWorksIfTheMissingFunctionIsAPropertyInTheUserProperties()
    {
        $login = $this->evangelist->login();
        $this->assertEquals('andela-celisha-wigwe', $login);
    }

    /**
     * @expectedException Elchroy\OSE\NoMethodException
     * @expectedExceptionMessage Method Error: 'noProperty' : andela-celisha-wigwe may not have this feature.
     * @return [type] [description]
     */
    public function testCallMagicMethodFailsIfTheMissingFunctionIsNotAPropertyInTheUserProperties()
    {
        $this->evangelist->noProperty();
    }

    public function testNameFunctionReturnsTheNameOfTheGitHubUser()
    {
        $name = $this->evangelist->name();
        $this->assertEquals('Elisha-Wigwe Chijioke O.', $name);
    }

    public function testNumOfReposFunctionWorks()
    {
        $repos = $this->evangelist->repos();
        $this->assertEquals(2, $repos);
    }

    public function testAllPublicFunctionsWork()
    {
        foreach ($this->data as $d) {
            $method = $d[0];
            $result = $this->evangelist->$method(); // The method should be called sttaight and not through the __get magic method
            $this->assertEquals($d[1], $result);
        }
    }

    public function testRankFunctionWorksFordifferentCases()
    {
        $newEvangelist = new Evangelist('roy');
        $data = [
                [1, 1],
                [5, 1],
                [10, 1],
                [11, 2],
                [16, 2],
                [20, 2],
                [21, 3],
                [30, 3],
                [100000, 3],
            ];
        foreach ($data as $d) {
            $newEvangelist->user->public_repos = $d[0];
            $level = $newEvangelist->level();
            $this->assertEquals($d[1], $level);
        }
    }
}
