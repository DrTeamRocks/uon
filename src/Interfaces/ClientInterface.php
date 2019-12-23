<?php

namespace UON\Interfaces;

/**
 * @author  Paul Rock <paul@drteam.rocks>
 * @link    http://drteam.rocks
 * @license MIT
 * @package UON\Interfaces
 */
interface ClientInterface
{
    /**
     * Array of allowed methods
     */
    const ALLOWED_METHODS = ['get', 'post', 'put', 'delete'];

    /**
     * Count of allowed tries
     */
    const TRIES = 10;

    /**
     * Waiting time
     */
    const SECONDS = 1;

    /**
     * Max request timeout per try
     */
    const MAX_REQUEST_TIMEOUT = 10.0;
}
