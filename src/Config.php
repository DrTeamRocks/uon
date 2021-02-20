<?php

namespace Uon;

use Uon\Exceptions\UonParameterNotAllowedException;
use Uon\Exceptions\UonParameterNotSetException;
use Uon\Interfaces\ConfigInterface;
use function in_array;
use function implode;

class Config implements ConfigInterface
{
    /**
     * List of allowed parameters
     */
    public const ALLOWED = [
        'token',
        'proxy',
        'base_uri',
        'handler',
        'user_agent',
        'timeout',
        'tries',
        'seconds',
        'debug',
        'verbose',
        'track_redirects',
        'format',
    ];

    /**
     * List of minimal required parameters
     */
    public const REQUIRED = [
        'token',
        'base_uri',
        'user_agent',
        'timeout',
    ];

    /**
     * List of configured parameters
     *
     * @var array
     */
    private $parameters;

    /**
     * Config constructor.
     *
     * @param array $parameters List of parameters which can be set on object creation stage
     *
     * @throws \ErrorException
     */
    public function __construct(array $parameters = [])
    {
        // Set default parameters of client
        $this->parameters = [
            // Errors must be disabled by default, because we need to get error codes
            // @link http://docs.guzzlephp.org/en/stable/request-options.html#http-errors
            'http_errors'     => false,

            // Wrapper settings
            'tries'           => 2,  // Count of tries
            'seconds'         => 10, // Waiting time per each try

            // Optional parameters
            'debug'           => false,
            'track_redirects' => false,
            'verbose'         => false,
            'format'          => 'json',

            // Main parameters
            'auto_exec'       => true,
            'timeout'         => 20,
            'user_agent'      => 'U-On PHP Client v2.x',
            'base_uri'        => 'https://api.u-on.ru',
        ];

        // Overwrite parameters by client input
        foreach ($parameters as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Magic setter parameter by name
     *
     * @param string               $parameter Name of parameter
     * @param string|bool|int|null $value     Value of parameter
     *
     * @throws \ErrorException
     */
    public function __set(string $parameter, $value)
    {
        $this->set($parameter, $value);
    }

    /**
     * Check if parameter if available
     *
     * @param string $parameter Name of parameter
     *
     * @return bool
     */
    public function __isset(string $parameter): bool
    {
        return isset($this->parameters[$parameter]);
    }

    /**
     * Get parameter via magic call
     *
     * @param string $parameter Name of parameter
     *
     * @return bool|int|string|null
     * @throws \ErrorException
     */
    public function __get(string $parameter)
    {
        return $this->get($parameter);
    }

    /**
     * Remove parameter from array
     *
     * @param string $parameter Name of parameter
     */
    public function __unset(string $parameter)
    {
        unset($this->parameters[$parameter]);
    }

    /**
     * Set parameter by name
     *
     * @param string               $parameter Name of parameter
     * @param string|bool|int|null $value     Value of parameter
     *
     * @return \Uon\Interfaces\ConfigInterface
     * @throws \Uon\Exceptions\UonParameterNotAllowedException
     */
    public function set(string $parameter, $value): ConfigInterface
    {
        if (!in_array($parameter, self::ALLOWED, false)) {
            throw new UonParameterNotAllowedException("Parameter \"$parameter\" is not allowed [" . implode(',', self::ALLOWED) . ']');
        }

        // Add parameters into array
        $this->parameters[$parameter] = $value;
        return $this;
    }

    /**
     * Get available parameter by name
     *
     * @param string $parameter Name of parameter
     *
     * @return bool|int|string|null
     * @throws \Uon\Exceptions\UonParameterNotSetException
     */
    public function get(string $parameter)
    {
        if (!isset($this->parameters[$parameter])) {

            if ($parameter === 'auto_exec') {
                return true;
            }

            if ($parameter === 'debug') {
                return false;
            }

            throw new UonParameterNotSetException("Parameter \"$parameter\" is not in set");
        }

        return $this->parameters[$parameter];
    }

    /**
     * Get all available parameters
     *
     * @return array
     */
    public function all(): array
    {
        return $this->parameters;
    }

    /**
     * Return all ready for Guzzle parameters
     *
     * @return array
     * @throws \Uon\Exceptions\UonParameterNotSetException
     */
    public function guzzle(): array
    {
        $options = [
            // 'base_uri'        => $this->get('base_uri'), // By some reasons base_uri option is not work anymore
            'timeout'         => $this->get('timeout'),
            'track_redirects' => $this->get('track_redirects'),
            'debug'           => $this->get('debug'),
            'headers'         => [
                'User-Agent' => $this->get('user_agent'),
            ],
        ];

        // Proxy is optional
        if (isset($this->proxy)) {
            $options['proxy'] = $this->proxy;
        }

        // Handler is optional for tests
        if (isset($this->handler)) {
            $options['handler'] = $this->handler;
        }

        return $options;
    }
}
