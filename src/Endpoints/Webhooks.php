<?php

namespace Uon\Endpoints;

use Uon\Client;

class Webhooks extends Client
{
    /**
     * Create a new webhook
     *
     * @link https://api.u-on.ru/{key}/webhook/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'webhook/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get a list of webhooks (divided by pages, 100 hotels per page)
     *
     * @link https://api.u-on.ru/{key}/webhook/{page}.{_format}
     *
     * @param int $page Number of page, 1 by default
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all(int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'webhook/' . $page;

        return $this->done();
    }

    /**
     * Update information about webhook
     *
     * @link https://api.u-on.ru/{key}/webhook/update/{id}.{_format}
     *
     * @param int   $id         Unique webhook ID
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'webhook/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Delete selected webhook from database
     *
     * @link https://api.u-on.ru/{key}/webhook/delete/{id}.{_format}
     *
     * @param int $id Unique webhook ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function delete(int $id)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'webhook/delete/' . $id;

        return $this->done();
    }
}
