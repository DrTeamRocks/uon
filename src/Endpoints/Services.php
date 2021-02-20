<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Services
 *
 * @package Uon\Endpoint
 */
class Services extends Client
{
    /**
     * Add service to voucher
     *
     * @link https://api.u-on.ru/{key}/request-action/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'service/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get a list of service types for voucher
     *
     * @link https://api.u-on.ru/{key}/service_type.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getTypes()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'service_type';

        return $this->done();
    }

    /**
     * Update service by ID
     *
     * @link https://api.u-on.ru/{key}/service/update/{id}.{_format}
     *
     * @param int   $id         Unique ID of service
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'service/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }
}
