<?php namespace UON;

/**
 * Class Hotels
 * @package UON
 */
class Hotels extends Client
{
    /**
     * Create new hotel
     *
     * @link    https://api.u-on.ru/{key}/hotel/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/hotel/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get a list of hotels (divided by pages, 100 hotels per page)
     *
     * @link    https://api.u-on.ru/{key}/hotels/{page}.{_format}
     * @param   int $page - Number of page with hotels
     * @return  array|false
     */
    public function all($page)
    {
        $endpoint = '/hotels/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get information about hotel
     *
     * @link    https://api.u-on.ru/{key}/hotel/{id}.{_format}
     * @param   int $id - Unique hotel ID
     * @return  array|false
     */
    public function get($id)
    {
        $endpoint = '/hotel/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Update information about hotel
     *
     * @link    https://api.u-on.ru/{key}/hotel/update/{id}.{_format}
     * @param   int $id - Unique hotel ID
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function update($id, $parameters)
    {
        $endpoint = '/hotel/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Delete selected hotel from database
     *
     * @link    https://api.u-on.ru/{key}/hotel/delete/{id}.{_format}
     * @param   int $id - Unique hotel ID
     * @return  array|false
     */
    public function delete($id)
    {
        $endpoint = '/hotel/delete/' . $id;
        return $this->doRequest('post', $endpoint);
    }

}
