<?php

namespace Elchroy\OSE;

/**
 * The OSEException class that throws an Exception. This class is parent to some other exception classes.
 */
class OSEException extends \Exception
{
    public $message;

    /**
     * __construct First compose a custom message with the user name and the method being called.
     *
     * @param string $message The message to be related when catching the exception.
     */
    public function __construct($message)
    {
        $this->message = $message;
        // set_exception_handler([$this, 'catchExceptions']);
    }

    /**
     * catchExceptions This class handles exceptions that are not caught.
     *
     * @return string the is the message for uncaught exceptions.
     */
    public function catchExceptions()
    {
        return $this->message;
    }
}
