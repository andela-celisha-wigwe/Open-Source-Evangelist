<?php

namespace Elchroy\OSE;

// require '../vendor/autoload.php';
use GuzzleHttp\Client;

/**
 * This is the Envagelist Class of GitHub.com users. It manages and ranks users based on certain criteria.
 */
class Evangelist
{
    public $user;

    public $ranks = [
            1 => 'Junior Evangelist',
            2 => 'Associate Evanlegist',
            3 => 'Senior Evangelist',
        ];
    public $repos;

    public $userData = '{
  "login": "unicodeveloper",
  "id": 2946769,
  "avatar_url": "https://avatars.githubusercontent.com/u/2946769?v=3",
  "gravatar_id": "",
  "url": "https://api.github.com/users/unicodeveloper",
  "html_url": "https://github.com/unicodeveloper",
  "followers_url": "https://api.github.com/users/unicodeveloper/followers",
  "following_url": "https://api.github.com/users/unicodeveloper/following{/other_user}",
  "gists_url": "https://api.github.com/users/unicodeveloper/gists{/gist_id}",
  "starred_url": "https://api.github.com/users/unicodeveloper/starred{/owner}{/repo}",
  "subscriptions_url": "https://api.github.com/users/unicodeveloper/subscriptions",
  "organizations_url": "https://api.github.com/users/unicodeveloper/orgs",
  "repos_url": "https://api.github.com/users/unicodeveloper/repos",
  "events_url": "https://api.github.com/users/unicodeveloper/events{/privacy}",
  "received_events_url": "https://api.github.com/users/unicodeveloper/received_events",
  "type": "User",
  "site_admin": false,
  "name": "Prosper Otemuyiwa",
  "company": "Andela",
  "blog": "http://goodheads.io",
  "location": "Lagos, Nigeria",
  "email": "prosperotemuyiwa@gmail.com",
  "hireable": null,
  "bio": null,
  "public_repos": 62,
  "public_gists": 5,
  "followers": 138,
  "following": 38,
  "created_at": "2012-12-02T21:53:16Z",
  "updated_at": "2016-02-26T17:31:43Z"
}';

    public function __construct($username)
    {
        $client = new Client();
        // $client->request('GET', "https://api.github.com/users/$username")->getBody();
        // $this->user = json_decode($client->request('GET', "https://api.github.com/users/$username")->getBody());
        $this->user = json_decode($this->userData);
    }

    public function __get($func)
    {
        // return method_exists($this, $func) ? call_user_func(array($this, $func)) : $this->throwNoMethodException($func);
      return method_exists($this, $func) ? call_user_func([$this, $func]) : $this->useProperties($func);
    }

    public function useProperties($property)
    {
        return $this->hasProperty($property) ? $this->user->$property : $this->throwNoMethodException($property);
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
        return (new EvangelistStatus($this->user))->getStatus();
    }

    public function rank()
    {
        return $this->ranks[$this->level()];
    }

    public function level()
    {
      $repos = $this->numPublicRepos();
        if ($repos >= 0 && $repos <= 10) {
        // if( in_array($this->numPublicRepos, range(1,10))) {
            return $level = 1;
        }
        if ($repos >= 11 && $repos <= 20) {
        // if( in_array($this->numPublicRepos, range(1,10))) {
            return $level = 2;
        }
        if ($repos >= 21) {
            return $level = 3;
        }
    }

    public function hasProperty($property)
    {
        return (bool) in_array($property, $this->properties());
    }

    private function throwNoMethodException($method)
    {
        // try {
      //   throw new NoMethodException($method);
      // } catch (NoMethodException $e) {
      //   return $e->getMessage();
      // }

      throw new NoMethodException($method);
    }
}

// $evan = new Evangelist('unicodeveloper');
// $evan = new Evangelist('andela-celisha-wigwe');
// $evan = new Evangelist('andela-joyebanji');

// $evan = new Evangelist('andela-gjames');
// $evan = new Evangelist('andela-badebiyi');
// $evan = new Evangelist('andela-tolotin');
// echo $evan->numPublicRepos();
// echo $evan->name;
// echo $evan->rank;
// echo $evan->rank;
// echo $evan->status;
// echo $evan->company;
