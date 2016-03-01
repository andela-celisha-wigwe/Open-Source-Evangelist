<?php

namespace Elchroy\OSE;

/**
 * The NoMethosExcetipon class that throws an Exception, when the method being called does not exist, with a customised message.
 */
class NoMethodException extends OSEException
{
    /**
     * __construct First compose a custom message with the user name and the method being called.
     *
     * @param string $username The username of the user that is being processed.
     * @param string $method   The method, being called that is not available.
     */
    public function __construct($username, $method)
    {
        $message = "Method Error: '$method' : $username may not have this feature."; // custom message.
        return parent::__construct($message); // Return an Exception using the parent class with the given message.
    }
}
