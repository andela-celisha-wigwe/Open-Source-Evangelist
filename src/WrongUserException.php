<?php

namespace Elchroy\OSE;

/**
 * The WrongUserException class that throws an Exception for an invalid username that is provided.
 */
class WrongUserException extends OSEException
{
    /**
     * __construct First compose a custom message with the user name and the method being called.
     *
     * @param string $message The message to be related to the user.
     */
    public function __construct($message)
    {
        echo "Faulty Username: " . parent::__construct($message);
    }

}
