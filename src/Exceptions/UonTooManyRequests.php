<?php

namespace Uon\Exceptions;

use ErrorException;

class UonTooManyRequests extends ErrorException
{
    protected $message = 'Too many requests';
}
