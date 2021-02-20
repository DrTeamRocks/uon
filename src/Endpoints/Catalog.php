<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class for management services of "I'am operator"
 *
 * @package Uon\Endpoint
 */
class Catalog extends Client
{
    /**
     * Get services of "I'm operator" by page number (first page by default)
     *
     * @link https://api.u-on.ru/{key}/bcard-bonus-by-card/{id}.{_format}
     *
     * @param int $page Number of page, 1 by default
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function get(int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'catalog-service/' . $page;

        return $this->done();
    }

    /**
     * Create services of "I'm operator"
     *
     * @link https://api.u-on.ru/{key}/bcard-activate/create.{_format}
     *
     * @param array $parameters List of parameters [s_id ...]
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'catalog-service/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Update services of "I'm operator"
     *
     * @link https://api.u-on.ru/{key}/catalog-service/update/{id}.{_format}
     *
     * @param int   $id         Unique ID of element
     * @param array $parameters List of parameters [s_id ...]
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'catalog-service/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }
}
