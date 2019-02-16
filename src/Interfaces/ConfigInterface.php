<?php

namespace UON\Interfaces;

use UON\Config;

interface ConfigInterface
{
    /**
     * List of allowed parameters
     */
    const ALLOWED = [
        'token',
        'timeout',
        'allow_redirects',
        'http_errors',
        'decode_content',
        'verify',
        'cookies',
        // For the error 429
        'tries',
        'seconds'
    ];

    /**
     * Set parameter by name
     *
     * @param   string          $parameter
     * @param   string|bool|int $value
     * @return  Config
     */
    public function set($parameter, $value);

    /**
     * Get available parameter by name
     *
     * @param   string $parameter
     * @return  string|bool|int
     */
    public function get($parameter);

    /**
     * Return all allowed parameters
     *
     * @return  array
     */
    public function getAllowed();

    /**
     * Return all preconfigured parameters
     *
     * @param   bool $ignore
     * @return  array
     */
    public function getParameters($ignore = false);

}
