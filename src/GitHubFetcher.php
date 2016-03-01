<?php

namespace Elchroy\OSE;

use GuzzleHttp\Client;

class GitHubFetcher
{
    public static function fetchGit($username)
    {
        $client = new Client();

        return $client->request('GET', "https://api.github.com/users/$username?client_id=42b7bfa66ecb6cb47cc1&client_secret=32d87cdfbaf8245ccdea6005d62f8587724bc2a5")->getBody();
    }
}
