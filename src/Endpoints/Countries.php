<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Countries
 *
 * @package Uon\Endpoint
 */
class Countries extends Client
{
    /**
     * Create new country
     *
     * @link https://api.u-on.ru/{key}/country/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'country/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get all countries
     *
     * @link https://api.u-on.ru/{key}/countries.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'countries';

        return $this->done();
    }

    /**
     * Update country by ID
     *
     * @link https://api.u-on.ru/{key}/country/update/{id}.{_format}
     *
     * @param int   $id         Unique country ID
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'country/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }
}
