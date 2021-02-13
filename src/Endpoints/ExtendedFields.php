<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class ExtendedFields
 *
 * @package UON\Endpoints
 * @since   2.0
 */
class ExtendedFields extends Client
{
    /**
     * Create new extended field
     *
     * @link https://api.u-on.ru/{key}/extended_field/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'extended_field/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get list of all extended fields
     *
     * @link https://api.u-on.ru/{key}/extended_field/{page}.{_format
     *
     * @param int $page Number of page with extended fields
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(int $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'extended_field/' . $page;

        return $this;
    }

    /**
     * Update extended field by ID
     *
     * @link https://api.u-on.ru/{key}/extended_field/update/{id}.{_format}
     *
     * @param int   $id         Unique country ID
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update(int $id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'extended_field/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Delete selected extended field
     *
     * @link https://api.u-on.ru/{key}/extended_field/delete/{id}.{_format}
     *
     * @param int $id Unique hotel ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function delete(int $id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'extended_field/delete/' . $id;

        return $this;
    }

}
