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
     * @var array
     */
    const ALLOWED_METHODS = ['get', 'post', 'put', 'delete'];
}
