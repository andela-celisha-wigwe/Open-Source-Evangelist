<?php

namespace Elchroy\OSE;

/**
 * This is the Envagelist Class of GitHub.com users. It manages and ranks users based on certain criteria.
 */
class Evangelist
{
    /**
     * $user Public variable to collect the JSON decoded user data.
     *
     * @var object
     */
    public $user;

    /**
     * [__construct First fetch the user data from the given username.
     * Decode the json data and store in the public user variable.
     *
     * @param string $username The user name of the user to be ranked.
     */
    public function __construct($username)
    {
        $user = self::fetchGitHub($username);
        $this->user = json_decode($user);
    }

    /**
     * __get Magic method - Call a method if it is called by the user but without the parentheses.
     * If the method does not exist the use the user's properties.
     *
     * @param string $func the function to be called if exists
     *
     * @return [type]
     */
    public function __get($func)
    {
        return method_exists($this, $func) ? call_user_func([$this, $func]) : $this->useProperties($func);
    }

    /**
     * __call Magic method - Call a user property if there is no defined method to return that particular user information.
     *
     * @param string $method The method that does not exist but might exist among the list of all properties.
     * @param string $args   The argument to be passed to the $method, if the $method requires.
     *
     * @return [type] The return value of calling the method with the arguments (if any). Otherwise throw an Exception.
     */
    public function __call($method, $args)
    {
        return $this->has($method) ? $this->callUser($method) : $this->throwNoMethodException($method);
    }

    /**
     * useProperties If the user has a given property, call the property. Otherwise throw an Exception.
     *
     * @param string $property The function to be called.
     *
     * @return [type] The return value of the function or an Exception.
     */
    public function useProperties($property)
    {
        return $this->has($property) ? $this->callUser($property) : $this->throwNoMethodException($property);
    }

    /**
     * [callUser This funciton is called by useProperties method to fetch some  user property from the user data.
     *
     * @param string $property The property to be retrieved.
     *
     * @return [type] The value of the property to be retrieved.
     */
    public function callUser($property)
    {
        return (string) $this->user->$property;
    }

    /**
     * name This function return that name of the user. It locates the name from the decoded user data.
     *
     * @return string The name of the user whose username was passed.
     */
    public function name()
    {
        return $this->user->name;
    }

    /**
     * properties This function fetches all the properties of the user.
     * It uses the keys of the user data after treating it as an array.
     *
     * @return array The array of all the properties of the user.
     */
    public function properties()
    {
        return array_keys((array) $this->user);
    }

    /**
     * repos This function fetches the number of repos (public) that the user has.
     *
     * @return int The number of repositories that the user has in GitHub.com.
     */
    public function repos()
    {
        return $this->user->public_repos;
    }

    /**
     * status This function return the user's status by calling in the EvangelistStatus class.
     *
     * @return string The status of the user as processed by the EvangelistStatus class.
     */
    public function status()
    {
        return (new EvangelistStatus($this->user->login))->getStatus();
    }

    /**
     * rank This function return the rank of the user by working with the EvangelistStatus class.
     *
     * @return string The rank of the user. Say "Junior Evangelist"
     */
    public function rank()
    {
        return EvangelistStatus::$ranks[$this->level()];
    }

    /**
     * level This function places the user in a rank depending on the result of the repos() function below.
     *
     * @return int The return valus is 1, 2 or 3. The level of the user.
     */
    public function level()
    {
        $repos = $this->repos();
        if ($repos >= 0 && $repos <= 10) {
            $level = 1;
        }
        if ($repos >= 11 && $repos <= 20) {
            $level = 2;
        }
        if ($repos >= 21) {
            $level = 3;
        }

        return $level;
    }

    /**
     * has This function checks whether the user has a given property.
     *
     * @param string $property The property to be checked against the user.
     *
     * @return bool True if the user has the function. False otherwise.
     */
    public function has($property)
    {
        // (func_num_args() != 1) ? $this->NumArgumentException(1) : '';
        return (bool) (in_array($property, $this->properties()) || method_exists($this, $property)); // ? 'true' : 'false';
    }

    /**
     * throwNoMethodException Private function to throw an exception. It is called by some other public functions.
     *
     * @param [type] $method [description]
     *
     * @return [type] [description]
     */
    private function throwNoMethodException($method)
    {
        throw new NoMethodException($this->login, $method);
    }

    /**
     * throwNumArgumentException Private function to throw an exception. It is called by some other public functions.
     *
     * @param [type] $number [description]
     *
     * @return [type] [description]
     */
    private function throwNumArgumentException($number)
    {
        throw new NumArgumentException($number);
    }

    private function fetchGitHub($username)
    {
        return $client = GitHubFetcher::fetchGit($username);
    }
}
