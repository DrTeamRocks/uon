<?php namespace UON;

use UON\Exceptions\ConfigException;

class Config implements Interfaces\ConfigInterface
{
    /**
     * List of allowed parameters
     * @var array
     */
    private $_allowed = [
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
    private $_parameters = [];

    /**
     * Work mode of return
     * @var bool
     */
    private $_return_object = false;

    /**
     * Get return type (object by default)
     *
     * @return  bool
     */
    public function isObject()
    {
        return $this->_return_object;
    }

    /**
     * Set work mode (object => true, array => false)
     *
     * @param   bool $object
     * @return  Interfaces\ConfigInterface
     */
    public function setReturn($object = true)
    {
        $this->_return_object = $object;
        return $this;
    }

    /**
     * Set parameter by name
     *
     * @param   string $parameter
     * @param   mixed $value
     * @return  Interfaces\ConfigInterface
     */
    public function set($parameter, $value)
    {
        // Check if parameter is available
        try {
            if (!\in_array($parameter, $this->_allowed, false)) {
                throw new ConfigException("Parameter \"$parameter\" is not in available list [" . implode(',',
                        $this->getAllowed()) . ']');
            }
        } catch (ConfigException $e) {
            // __constructor
        }

        // Add parameters into array
        $this->_parameters[$parameter] = $value;
        return $this;
    }

    /**
     * Get all available parameters on only one
     *
     * @param   string $parameter
     * @return  string|bool
     */
    public function get($parameter)
    {
        return isset($this->_parameters[$parameter])
            ? $this->_parameters[$parameter]
            : false;
    }

    /**
     * Return all allowed parameters
     *
     * @return  array
     */
    public function getAllowed()
    {
        return $this->_allowed;
    }

    /**
     * Return all preconfigured parameters
     *
     * @param   bool $ignore_token
     * @return  array
     */
    public function getParameters($ignore_token = false)
    {
        $array = $this->_parameters;

        // Remove "token" from array
        if ($ignore_token) {
            unset($array['token']);
        }

        return $array;
    }
}
