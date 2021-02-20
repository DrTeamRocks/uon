<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Cash
 *
 * @package Uon\Endpoint
 */
class Cash extends Client
{
    /**
     * @var string
     */
    protected $namespace = __CLASS__;

    /**
     * Get a list of checkouts
     *
     * @link https://api.u-on.ru/{key}/cash.{_format}
     *
     * @param array $parameters List of parameters ['id', 'name', 'name_en']
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function get(array $parameters = [])
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'cash';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Add new cashbox
     *
     * @link https://api.u-on.ru/{key}/cash/create.{_format}
     *
     * @param array $parameters List of parameters ['name']
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'cash/create';
        $this->params   = $parameters;

        return $this->done();
    }
}
