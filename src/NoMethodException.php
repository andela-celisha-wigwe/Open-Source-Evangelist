<?php

namespace Elchroy\OSE;

class NoMethodException extends \Exception
{
    public $message;

    public function __construct($method)
    {
        set_exception_handler([$this, 'catchException']);
        $this->message = "Method Error: '$method'. Probably the user does not have this feature.";
    }

    public function catchException()
    {
        echo $this->message;
    }
}
