<?php namespace UON\Interfaces;

interface Config
{
    /**
     * Set parameter by name
     *
     * @param   $parameter
     * @param   $value
     * @return  bool|Config
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
     * @return  array
     */
    public function getParameters();

}
