<?php

namespace UON\Endpoint;

use UON\Client;

/**
 * Class Payments
 *
 * @package UON\Endpoint
 */
class Payments extends Client
{
    /**
     * Create new payment
     *
     * @link    https://api.u-on.ru/{key}/payment/create.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function create(array $parameters)
    {
        $endpoint = '/payment/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get full list of payments in dates range
     *
     * @link    https://api.u-on.ru/{key}/payment/list/{date_from}/{date_to}.{_format}
     * @param   string $date_from Start of dates range
     * @param   string $date_to   End of dates range
     * @param   int    $page      Number of page, 1 by default
     * @return  array|false
     */
    public function all($date_from, $date_to, $page = 1)
    {
        $endpoint = '/payment/list/' . $date_from . '/' . $date_to . '/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get a single payment
     *
     * @link    https://api.u-on.ru/{key}/payment/{id}.{_format}
     * @param   int $id Unique payment ID
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
     * @param   int   $id         Unique payment ID
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function update($id, array $parameters)
    {
        $endpoint = '/payment/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Delete selected payment from database
     *
     * @link    https://api.u-on.ru/{key}/payment/delete/{id}.{_format}
     * @param   int $id Unique payment ID
     * @return  array|false
     */
    public function delete($id)
    {
        $endpoint = '/payment/delete/' . $id;
        return $this->doRequest('post', $endpoint);
    }

}
