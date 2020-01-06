<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Countries
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'country/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get all countries
     *
     * @link https://api.u-on.ru/{key}/countries.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'countries';

        return $this;
    }

    /**
     * Update country by ID
     *
     * @link https://api.u-on.ru/{key}/country/update/{id}.{_format}
     *
     * @param int   $id         Unique country ID
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update($id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'country/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

}
