<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class for management services of "I'am operator"
 *
 * @package UON\Endpoint
 */
class Catalog extends Client
{
    /**
     * Get services of "I'am operator" by page number (first page by default)
     *
     * @link https://api.u-on.ru/{key}/bcard-bonus-by-card/{id}.{_format}
     *
     * @param int $page Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function get($page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'catalog-service/' . $page;

        return $this;
    }

    /**
     * Create services of "I'am operator"
     *
     * @link https://api.u-on.ru/{key}/bcard-activate/create.{_format}
     *
     * @param array $parameters List of parameters [s_id ...]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'catalog-service/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Update services of "I'am operator"
     *
     * @link https://api.u-on.ru/{key}/catalog-service/update/{id}.{_format}
     *
     * @param int   $id         Unique ID of element
     * @param array $parameters List of parameters [s_id ...]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update($id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'catalog-service/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

}
