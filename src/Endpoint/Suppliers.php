<?php

namespace UON\Endpoint;

use UON\Client;

/**
 * Class Suppliers
 *
 * @package UON\Endpoint
 */
class Suppliers extends Client
{
    /**
     * Add new partner
     *
     * @link    https://api.u-on.ru/{key}/supplier/create.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function create(array $parameters)
    {
        $endpoint = '/supplier/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Create new type for partners
     *
     * @link    https://api.u-on.ru/{key}/supplier_type/create.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function createType(array $parameters)
    {
        $endpoint = '/supplier_type/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get a list of partners
     *
     * @link    https://api.u-on.ru/{key}/supplier/{id}.{_format}
     * @param   array $parameters List of parameters
     * @param   int   $page       Number of page, 1 by default
     * @return  array|false
     */
    public function all(array $parameters = [], $page = 1)
    {
        $endpoint = '/suppliers/' . $page;
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get partner by ID
     *
     * @link    https://api.u-on.ru/{key}/supplier.{_format}
     * @param   int   $id         ID of partner
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function get($id, array $parameters = [])
    {
        $endpoint = '/supplier/' . $id;
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get a list of partners types
     *
     * @link    https://api.u-on.ru/{key}/supplier_type.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function getTypes(array $parameters = [])
    {
        $endpoint = '/supplier_type';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Update partner by ID
     *
     * @link    https://api.u-on.ru/{key}/supplier/update/{id}.{_format}
     * @param   int   $id         Unique ID of service
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function update($id, array $parameters)
    {
        $endpoint = '/supplier/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
