<?php namespace UON;

/**
 * Class Cities
 * @package UON
 */
class Cities extends Client
{
    /**
     * Create new city in country
     *
     * @link    https://api.u-on.ru/{key}/city/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/city/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get all cities by country id
     *
     * @link    https://api.u-on.ru/{key}/cities/{country_id}.{_format}
     * @param   int $id - Unique ID of country
     * @return  array|false
     */
    public function all($id)
    {
        $endpoint = '/cities/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Update some city by ID
     *
     * @link    https://api.u-on.ru/{key}/city/update/{id}.{_format}
     * @param   int $id - Unique city ID
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function update($id, $parameters)
    {
        $endpoint = '/city/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
