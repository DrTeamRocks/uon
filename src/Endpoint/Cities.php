<?php

namespace UON\Endpoint;

use UON\Client;

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
     * @link    https://api.u-on.ru/{key}/city/create.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function create(array $parameters)
    {
        $endpoint = '/city/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get all cities by country id
     *
     * @link    https://api.u-on.ru/{key}/cities/{country_id}.{_format}
     * @param   int $id_country Unique ID of country
     * @param   int $page       Number of page, 1 by default
     * @return  array|false
     */
    public function all($id_country, $page = 1)
    {
        $endpoint = '/cities/' . $id_country . '/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Update some city by ID
     *
     * @link    https://api.u-on.ru/{key}/city/update/{id}.{_format}
     * @param   int   $id         Unique city ID
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function update($id, array $parameters)
    {
        $endpoint = '/city/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
