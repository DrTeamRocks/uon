<?php

namespace UON;

use UON\Exceptions\ConfigException;
use UON\Interfaces\ConfigInterface;

class Config implements ConfigInterface
{
    /**
     * List of configured parameters
     *
     * @var array
     */
    private $_parameters = [
        // Errors must be disabled by default, because we need to get error codes
        // @link http://docs.guzzlephp.org/en/stable/request-options.html#http-errors
        'http_errors' => false
    ];

    /**
     * Work mode of return
     *
     * @var bool
     */
    private $_return_object = false;

    /**
     * Get return type (object by default)
     *
     * @return  bool
     * @deprecated
     */
    public function isObject()
    {
        return $this->_return_object;
    }

    /**
     * Set work mode (object => true, array => false)
     *
     * @param   bool $object
     * @return  \UON\Interfaces\ConfigInterface
     * @deprecated
     */
    public function setReturn($object = true)
    {
        $this->_return_object = $object;
        return $this;
    }

    /**
     * Set parameter by name
     *
     * @param   string          $parameter
     * @param   string|bool|int $value
     * @return  \UON\Interfaces\ConfigInterface
     */
    public function set($parameter, $value)
    {
        // Checking if parameter is in "available" list
        try {
            if (!\in_array($parameter, $this->getAllowed(), false)) {
                throw new ConfigException("Parameter \"$parameter\" is not in available list [" . implode(',', $this->getAllowed()) . ']');
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
     * @return  string|bool|int
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
        return self::ALLOWED;
    }

    /**
     * Return all preconfigured parameters
     *
     * @param   bool  $ignore       Ignore parameters which is not important for client
     * @param   array $ignore_items Which items should be excluded from array
     * @return  array
     */
    public function getParameters($ignore = false, array $ignore_items = ['token', 'tries', 'seconds'])
    {
        $parameters = $this->_parameters;
        // Remove ignored items from array
        if ($ignore) {
            foreach ($parameters as $key => $value) {
                if (in_array($key, $ignore_items, false)) {
                    unset($parameters[$key]);
                }
            }
        }
        return $parameters;
    }
}
