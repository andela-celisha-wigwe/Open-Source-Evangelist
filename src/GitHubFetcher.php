<?php

namespace Elchroy\OSE;

use GuzzleHttp\Client;

class GitHubFetcher
{
    /**
     * fetchGit This function fetches the user data given the username.
     *
     * @param string $username the user name of the user to be fetched.
     *
     * @return string The JSON encoded string containing the fetched user data.
     */
    public static function fetchGit($username)
    {
        $client = new Client(); // Create a new Client.

        return $client->request('GET', "https://api.github.com/users/$username?client_id=42b7bfa66ecb6cb47cc1&client_secret=32d87cdfbaf8245ccdea6005d62f8587724bc2a5")->getBody(); // Return the client's data as JSON string
    }
}
