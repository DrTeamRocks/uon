<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

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
     * @link https://api.u-on.ru/{key}/supplier/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'supplier/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Create new type for partners
     *
     * @link https://api.u-on.ru/{key}/supplier_type/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createType(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'supplier_type/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get a list of partners
     *
     * @link https://api.u-on.ru/{key}/supplier/{id}.{_format}
     *
     * @param array $parameters List of parameters
     * @param int   $page       Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(array $parameters = [], int $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'suppliers/' . $page;
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get partner by ID
     *
     * @link https://api.u-on.ru/{key}/supplier.{_format}
     *
     * @param int   $id         ID of partner
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function get(int $id, array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'suppliers/' . $id;
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get a list of partners types
     *
     * @link https://api.u-on.ru/{key}/supplier_type.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getTypes(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'supplier_type';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Update partner by ID
     *
     * @link https://api.u-on.ru/{key}/supplier/update/{id}.{_format}
     *
     * @param int   $id         Unique ID of service
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update(int $id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'supplier/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

}
