<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Hotels
 *
 * @package Uon\Endpoint
 */
class Hotels extends Client
{
    /**
     * Create new hotel
     *
     * @link https://api.u-on.ru/{key}/hotel/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'hotel/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get a list of hotels (divided by pages, 100 hotels per page)
     *
     * @link https://api.u-on.ru/{key}/hotels/{page}.{_format}
     *
     * @param int $page Number of page, 1 by default
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all(int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'hotels/' . $page;

        return $this->done();
    }

    /**
     * Get information about hotel
     *
     * @link https://api.u-on.ru/{key}/hotel/{id}.{_format}
     *
     * @param int $id Unique hotel ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function get(int $id)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'hotel/' . $id;

        return $this->done();
    }

    /**
     * Update information about hotel
     *
     * @link https://api.u-on.ru/{key}/hotel/update/{id}.{_format}
     *
     * @param int   $id         Unique hotel ID
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'hotel/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Delete selected hotel from database
     *
     * @link https://api.u-on.ru/{key}/hotel/delete/{id}.{_format}
     *
     * @param int $id Unique hotel ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function delete(int $id)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'hotel/delete/' . $id;

        return $this->done();
    }
}
