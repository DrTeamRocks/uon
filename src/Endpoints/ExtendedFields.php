<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class ExtendedFields
 *
 * @package Uon\Endpoints
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
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'extended_field/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get list of all extended fields
     *
     * @link https://api.u-on.ru/{key}/extended_field/{page}.{_format
     *
     * @param int $page Number of page with extended fields
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all(int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'extended_field/' . $page;

        return $this->done();
    }

    /**
     * Update extended field by ID
     *
     * @link https://api.u-on.ru/{key}/extended_field/update/{id}.{_format}
     *
     * @param int   $id         Unique country ID
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'extended_field/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Delete selected extended field
     *
     * @link https://api.u-on.ru/{key}/extended_field/delete/{id}.{_format}
     *
     * @param int $id Unique hotel ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function delete(int $id)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'extended_field/delete/' . $id;

        return $this->done();
    }
}
