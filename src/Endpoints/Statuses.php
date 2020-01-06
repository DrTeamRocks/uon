<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Statuses
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function get(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'status';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get a list of statuses for leads
     *
     * @link https://api.u-on.ru/{key}/status_lead.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getLead(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'status_lead';
        $this->params   = $parameters;

        return $this;
    }

}
