<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Statuses
 *
 * @package Uon\Endpoint
 */
class Statuses extends Client
{
    /**
     * Get statuses list
     *
     * @link https://api.u-on.ru/{key}/status.{_format}
     *
     * @param array|null $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function get(array $parameters = [])
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'status';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get a list of statuses for leads
     *
     * @link https://api.u-on.ru/{key}/status_lead.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getLead(array $parameters = [])
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'status_lead';
        $this->params   = $parameters;

        return $this->done();
    }
}
