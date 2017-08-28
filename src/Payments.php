<?php namespace UON;

/**
 * Class Payments
 * @package UON
 */
class Payments extends Client
{
    /**
     * Create new payment
     *
     * @link    https://api.u-on.ru/{key}/payment/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/payment/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get full list of payments in dates range
     *
     * @link    https://api.u-on.ru/{key}/payment/list/{date_from}/{date_to}.{_format}
     * @param   string $date_from
     * @param   string $date_to
     * @return  array|false
     */
    public function all($date_from, $date_to)
    {
        $endpoint = '/payment/list/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get a single payment
     *
     * @link    https://api.u-on.ru/{key}/payment/{id}.{_format}
     * @param   int $id - Unique payment ID
     * @return  array|false
     */
    public function get($id)
    {
        $endpoint = '/payment/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Update selected payment by id
     *
     * @link    https://api.u-on.ru/{key}/payment/update/{id}.{_format}
     * @param   int $id - Unique payment ID
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function update($id, $parameters)
    {
        $endpoint = '/payment/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Delete selected payment from database
     *
     * @link    https://api.u-on.ru/{key}/payment/delete/{id}.{_format}
     * @param   int $id - Unique payment ID
     * @return  array|false
     */
    public function delete($id)
    {
        $endpoint = '/payment/delete/' . $id;
        return $this->doRequest('post', $endpoint);
    }

}
