<?php

use Elchroy\OSE\GitHubFetcher;

class GitHubFetcherTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException GuzzleHttp\Exception\ClientException
     * @return [type] [description]
     */
    public function testWhenUserNameIsNotValid()
    {
        GitHubFetcher::fetchGit('no_user');
    }
}