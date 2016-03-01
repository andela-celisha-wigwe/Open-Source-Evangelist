<?php

namespace Elchroy\OSE;

/**
 * The OSEException class that throws an Exception with a customised message.
 */
abstract class OSEException extends \Exception
{

    public $message;
    /**
     * __construct First compose a custom message with the user name and the method being called.
     *
     * @param string $username The username of the user that is being processed.
     * @param string $method   The method, being called that is not available.
     */
    public function __construct($message)
    {
        $this->message = $message;
        set_exception_handler([$this, 'catchExceptions']);
    }

    public function catchExceptions()
    {
        return $this->message;
    }
}
