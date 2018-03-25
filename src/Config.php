<?php namespace UON;

use UON\Exceptions\ConfigException;

class Config implements Interfaces\Config
{
    /**
     * List of allowed parameters
     * @var array
     */
    private $allowed = [
        'token',
        'timeout',
        'allow_redirects',
        'http_errors',
        'decode_content',
        'verify',
        'cookies'
    ];

    /**
     * List of configured parameters
     * @var array
     */
    private $parameters = [];

    /**
     * Set parameter by name
     *
     * @param   $parameter
     * @param   $value
     * @return  bool|Interfaces\Config
     */
    public function set($parameter, $value)
    {
        // Check if parameter is available
        try {
            if (!in_array($parameter, $this->allowed)) {
                throw new ConfigException("Parameter \"$parameter\" is not in available list [" . implode(',', $this->getAllowed()) . "]");
            }
        } catch (ConfigException $e) {
            return false;
        }

        // Add parameters into array
        $this->parameters[$parameter] = $value;
        return $this;
    }

    /**
     * Get all available parameters on only one
     *
     * @param   string $parameter
     * @return  string
     */
    public function get($parameter)
    {
        return $this->parameters[$parameter];
    }

    /**
     * Return all allowed parameters
     *
     * @return  array
     */
    public function getAllowed()
    {
        return $this->allowed;
    }

    /**
     * Return all preconfigured parameters
     *
     * @param   bool $ignore_token
     * @return  array
     */
    public function getParameters($ignore_token = false)
    {
        $array = $this->parameters;

        // Remove "token" from array
        if ($ignore_token) unset($array['token']);

        return $array;
    }
}
