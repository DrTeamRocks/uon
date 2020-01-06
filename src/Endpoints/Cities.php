<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Cities
 *
 * @package UON\Endpoint
 */
class Cities extends Client
{
    /**
     * Create new city in country
     *
     * @link https://api.u-on.ru/{key}/city/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'city/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get all cities by country id
     *
     * @link https://api.u-on.ru/{key}/cities/{country_id}.{_format}
     *
     * @param int $id_country Unique ID of country
     * @param int $page       Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all($id_country, $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'cities/' . $id_country . '/' . $page;

        return $this;
    }

    /**
     * Update some city by ID
     *
     * @link https://api.u-on.ru/{key}/city/update/{id}.{_format}
     *
     * @param int   $id         Unique city ID
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update($id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'city/update/' . $id;

        return $this;
    }

}
