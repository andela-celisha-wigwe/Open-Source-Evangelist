<?php

namespace Elchroy\OSE;

use GuzzleHttp\Client;

/**
 * This is the Envagelist Class of GitHub.com users. It manages and ranks users based on certain criteria.
 */
class Evangelist
{
    public $user;

    public $repos;

    public function __construct($username)
    {
        $client = new Client();
        $result = ($client->request('GET', "https://api.github.com/users/$username?client_id=42b7bfa66ecb6cb47cc1&client_secret=32d87cdfbaf8245ccdea6005d62f8587724bc2a5")->getBody());
        $this->user = json_decode($result);
    }

    public function __get($func)
    {
        return method_exists($this, $func) ? call_user_func([$this, $func]) : $this->useProperties($func);
    }

    public function __call($method, $args)
    {
        return $this->has($method) ? $this->callUser($method) : $this->throwNoMethodException($method);
    }

    public function useProperties($property)
    {
        return $this->has($property) ? $this->callUser($property) : $this->throwNoMethodException($property);
    }

    public function callUser($property)
    {
        return (string) $this->user->$property;
    }

    public function name()
    {
        return $this->user->name;
    }

    public function properties()
    {
        return array_keys((array) $this->user);
    }

    public function numPublicRepos()
    {
        return $this->user->public_repos;
    }

    public function status()
    {
        return (new EvangelistStatus($this->user->login))->getStatus();
    }

    public function rank()
    {
        return EvangelistStatus::$ranks[$this->level()];
    }

    public function level()
    {
        $repos = $this->numPublicRepos();
        if ($repos >= 0 && $repos <= 10) {
            return $level = 1;
        }
        if ($repos >= 11 && $repos <= 20) {
            return $level = 2;
        }
        if ($repos >= 21) {
            return $level = 3;
        }
    }

    public function has($property)
    {
        // (func_num_args() != 1) ? $this->NumArgumentException(1) : '';
        return (bool) (in_array($property, $this->properties()) || method_exists($this, $property)); // ? 'true' : 'false';
    }

    private function throwNoMethodException($method)
    {
        throw new NoMethodException($this->login, $method);
    }

    private function throwNumArgumentException($number)
    {
        throw new NumArgumentException($number);
    }
}
