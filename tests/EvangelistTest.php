<?php
use Elchroy\OSE\Evangelist;
use Elchroy\OSE\NoMethodException;

class EvangelistTest extends PHPUnit_Framework_TestCase
{
    // public $user;
    public $data = array(
                ['name', 'Prosper Otemuyiwa'],
                ['numPublicRepos', 62],
                ['status', 'Yeah, I crown you Senior Evangelist. Thanks for making the world a better place'],
                ['rank', 'Senior Evangelist'],
                ['level', 3],
            );
    public $evangelist;
    public function setUp()
    {
        $this->evangelist = new Evangelist('unicodeveloper');
    }

    public function testGuzzleHttpFetchIsPositive()
    {

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
     * @expectedExceptionMessage Method Error: 'vampireStatus'. Probably the user does not have this feature.
     *
     * @return [type] [description]
     */
    public function testGetMagicFunctionThrowsExceptionWhenTheMethodDoesNotExist()
    {
        $this->evangelist->vampireStatus;
    }

    public function testNameFunctionReturnTheNameOfTheGitHubUser()
    {
        $name = $this->evangelist->name();
        $this->assertEquals("Prosper Otemuyiwa", $name);
    }

    public function testNumOfPublicReposFunctionWorks()
    {
        $repos = $this->evangelist->numPublicRepos();
        $this->assertEquals(62, $repos);
    }

    public function testAllPublicFunctionsWork()
    {
        foreach ($this->data as $d) {
            $method = $d[0];
            $result = $this->evangelist->$method(); // The method should be called sttaight and not through the __get magic method
            $this->assertEquals($d[1], $result);
        }
    }

}