<?php namespace UON;

/**
 * Class Countries
 * @package UON
 */
class Countries extends Client
{
    /**
     * Create new country
     *
     * @link    https://api.u-on.ru/{key}/country/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/country/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get all countries
     *
     * @link    https://api.u-on.ru/{key}/countries.{_format}
     * @return  array|false
     */
    public function all()
    {
        $endpoint = '/countries';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Update country by ID
     *
     * @link    https://api.u-on.ru/{key}/country/update/{id}.{_format}
     * @param   int $id - Unique country ID
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function update($id, $parameters)
    {
        $endpoint = '/country/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
