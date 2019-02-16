<?php

namespace UON\Exceptions;

class Exceptions extends \Exception
{
    public function __construct($message = '', $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->errorLog(
            'Uncaught Error: ' . $this->getMessage() . ' in ' . $this->getFile() . ':' . $this->getLine()
            . "Stack trace:\n" . $this->getTraceAsString()
            . "\tthrown in " . $this->getFile() . ' on line ' . $this->getLine()
        );
    }

    public function errorLog($error)
    {
        error_log($error);
        return false;
    }
}
