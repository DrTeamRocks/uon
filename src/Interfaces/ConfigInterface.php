<?php

namespace UON\Interfaces;

interface ConfigInterface
{
    /**
     * Set parameter by name
     *
     * @param string          $parameter
     * @param string|bool|int $value
     *
     * @return \UON\Interfaces\ConfigInterface
     */
    public function set(string $parameter, $value): ConfigInterface;

    /**
     * Get available parameter by name
     *
     * @param string $parameter
     *
     * @return string|bool|int
     */
    public function get(string $parameter);

    /**
     * Get all available parameters
     *
     * @return array
     */
    public function all(): array;

    /**
     * Return all ready for Guzzle parameters
     *
     * @return array
     * @throws \ErrorException
     */
    public function guzzle(): array;
}
