<?php

namespace UON\Endpoints;

use UON\Client;

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
     * @return self
     */
    public function get(array $parameters = []): self
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
     * @return self
     */
    public function create(array $parameters): self
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'cash/create';
        $this->params   = $parameters;

        return $this;
    }

}
