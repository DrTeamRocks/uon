<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Cash
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function get(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'cash';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Add new cashbox
     *
     * @link https://api.u-on.ru/{key}/cash/create.{_format}
     *
     * @param array $parameters List of parameters ['name']
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'cash/create';
        $this->params   = $parameters;

        return $this;
    }

}
