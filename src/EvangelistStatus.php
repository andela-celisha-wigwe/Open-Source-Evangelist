<?php

namespace Elchroy\OSE;

// require '../vendor/autoload.php';

use GuzzleHttp\Client;


class EvangelistStatus
{
    public $message = array(
            1 => 'Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist',
            2 => 'Keep Up The Good Work, I crown you Associate Evangelist',
            3 => 'Yeah, I crown you Senior Evangelist. Thanks for making the world a better place',
        );
    // public $junior = "Damn It!!! Please make the world better, Oh Ye Prodigal Junior Evangelist";
    // public $associate = "Keep Up The Good Work, I crown you Associate Evangelist";
    // public $senior = "Yeah, I crown you Senior Evangelist. Thanks for making the world a better place";
    public $evangelist;

    public function __construct($username)
    {
        $this->evangelist = new Evangelist($username);
    }

    public function getStatus()
    {
        $rank = $this->evangelist->level;
        return $this->message[$rank];
    }
}

// $status = new EvangelistStatus('unicodeveloper');
// echo $status->getStatus();

