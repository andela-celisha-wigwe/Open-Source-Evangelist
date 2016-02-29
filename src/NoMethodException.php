<?php

namespace Elchroy\OSE;

class NoMethodException extends \Exception
{
    public function __construct($username ,$method)
    {
        $message = "Method Error: '$method' : $username may not have this feature.";
        return parent::__construct($message);
    }

}
