<?php namespace UON\Interfaces;

interface ConfigInterface
{
    /**
     * Set parameter by name
     *
     * @param   string $parameter
     * @param   mixed $value
     * @return  ConfigInterface
     */
    public function set($parameter, $value);

    /**
     * Get available parameter by name
     *
     * @param   string $parameter
     * @return  string
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
     * @param   bool $ignore_token
     * @return  array
     */
    public function getParameters($ignore_token = false);

}
