<?php

namespace UON\Endpoints;

use UON\Interfaces\QueryInterface;

class Webhooks extends \UON\Client
{
    /**
     * Create a new webhook
     *
     * @link https://api.u-on.ru/{key}/webhook/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'webhook/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get a list of webhooks (divided by pages, 100 hotels per page)
     *
     * @link https://api.u-on.ru/{key}/webhook/{page}.{_format}
     *
     * @param int $page Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(int $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'webhook/' . $page;

        return $this;
    }

    /**
     * Update information about webhook
     *
     * @link https://api.u-on.ru/{key}/webhook/update/{id}.{_format}
     *
     * @param int   $id         Unique webhook ID
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update(int $id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'webhook/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Delete selected webhook from database
     *
     * @link https://api.u-on.ru/{key}/webhook/delete/{id}.{_format}
     *
     * @param int $id Unique webhook ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function delete(int $id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'webhook/delete/' . $id;

        return $this;
    }
}