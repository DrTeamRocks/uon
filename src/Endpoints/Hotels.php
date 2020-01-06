<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Hotels
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'hotel/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get a list of hotels (divided by pages, 100 hotels per page)
     *
     * @link https://api.u-on.ru/{key}/hotels/{page}.{_format}
     *
     * @param int $page Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all($page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'hotels/' . $page;

        return $this;
    }

    /**
     * Get information about hotel
     *
     * @link https://api.u-on.ru/{key}/hotel/{id}.{_format}
     *
     * @param int $id Unique hotel ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function get($id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'hotel/' . $id;

        return $this;
    }

    /**
     * Update information about hotel
     *
     * @link https://api.u-on.ru/{key}/hotel/update/{id}.{_format}
     *
     * @param int   $id         Unique hotel ID
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update($id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'hotel/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Delete selected hotel from database
     *
     * @link https://api.u-on.ru/{key}/hotel/delete/{id}.{_format}
     *
     * @param int $id Unique hotel ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function delete($id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'hotel/delete/' . $id;

        return $this;
    }

}
