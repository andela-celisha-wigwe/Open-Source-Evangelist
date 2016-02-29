<?php

namespace Elchroy\OSE;

class EvangelistStatus
{
    public static $ranks = [
            1 => 'Junior Evangelist',
            2 => 'Associate Evanlegist',
            3 => 'Senior Evangelist',
        ];

    public $message = [
            1 => 'Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist',
            2 => 'Keep Up The Good Work, I crown you Associate Evangelist',
            3 => 'Yeah, I crown you Senior Evangelist. Thanks for making the world a better place',
        ];

    public $evangelist;

    public function __construct($username)
    {
        $this->evangelist = new Evangelist($username);
    }

    public function getStatus()
    {
        $level = $this->evangelist->level;
        return $this->message[$level];
    }

}