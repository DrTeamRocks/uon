<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Cities
 *
 * @package Uon\Endpoint
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
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'city/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get all cities by country id
     *
     * @link https://api.u-on.ru/{key}/cities/{country_id}.{_format}
     *
     * @param int $countryId Unique ID of country
     * @param int $page      Number of page, 1 by default
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all(int $countryId, int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'cities/' . $countryId . '/' . $page;

        return $this->done();
    }

    /**
     * Update some city by ID
     *
     * @link https://api.u-on.ru/{key}/city/update/{id}.{_format}
     *
     * @param int   $id         Unique city ID
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'city/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }
}
