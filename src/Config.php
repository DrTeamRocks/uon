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
     * Config constructor.
     *
     * @param   array $parameters List of parameters which can be set on object creation stage
     * @throws  \UON\Exceptions\ConfigException
     * @since   1.9
     */
    public function __construct(array $parameters = [])
    {
        foreach ($parameters as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Set parameter by name
     *
     * @param   string          $name
     * @param   string|bool|int $value
     * @return  \UON\Interfaces\ConfigInterface
     * @throws  \UON\Exceptions\ConfigException
     */
    public function set($name, $value)
    {
        if (!\in_array($name, $this->getAllowed(), false)) {
            throw new ConfigException("Parameter \"$name\" is not in available list [" . implode(',', $this->getAllowed()) . ']');
        }

        // Add parameters into array
        $this->_parameters[$name] = $value;
        return $this;
    }

    /**
     * Get all available parameters on only one
     *
     * @param   string $name
     * @return  string|bool|int
     */
    public function get($name)
    {
        return isset($this->_parameters[$name])
            ? $this->_parameters[$name]
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
    public function getParameters($ignore = false, array $ignore_items = ['token', 'tries', 'seconds', 'maxRequestTimeout'])
    {
        $parameters = $this->_parameters;
        // Remove ignored items from array
        if ($ignore) {
            foreach ($parameters as $name => $value) {
                if (in_array($name, $ignore_items, false)) {
                    unset($parameters[$name]);
                }
            }
        }
        return $parameters;
    }
}
