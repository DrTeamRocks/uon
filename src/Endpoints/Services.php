<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Services
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'service/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get a list of service types for voucher
     *
     * @link https://api.u-on.ru/{key}/service_type.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getTypes(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'service_type';

        return $this;
    }

    /**
     * Update service by ID
     *
     * @link https://api.u-on.ru/{key}/service/update/{id}.{_format}
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
        $this->endpoint = 'service/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

}
