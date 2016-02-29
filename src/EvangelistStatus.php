<?php

namespace Elchroy\OSE;

/**
 * The EvangelistStatus class to return the user status and the user rank.
 * This class works with the Evangelist class.
 */
class EvangelistStatus
{
    /**
     * $ranks The possible ranks that a GitHub user can attain.
     *
     * @var array An associative array.
     */
    public static $ranks = [
            1 => 'Junior Evangelist',
            2 => 'Associate Evanlegist',
            3 => 'Senior Evangelist',
        ];

    /**
     * $messages The possible status messages that can be related to the user.
     *
     * @var array An associative array.
     */
    public $messages = [
            1 => 'Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist',
            2 => 'Keep Up The Good Work, I crown you Associate Evangelist',
            3 => 'Yeah, I crown you Senior Evangelist. Thanks for making the world a better place',
        ];

    /**
     * $evangelist The public variable that takes up the user object data.
     *
     * @var [type]
     */
    public $evangelist;

    /**
     * __construct First create a new evangelist and assign to the public evangelist variable.
     *
     * @param string $username The username of the user whose status is required.
     */
    public function __construct($username)
    {
        $this->evangelist = new Evangelist($username);
    }

    /**
     * getStatus This function return the status of the evangelist user.
     *
     * @return string The status message to be related to the user.
     */
    public function getStatus()
    {
        $level = $this->evangelist->level;

        return $this->messages[$level];
    }
}
