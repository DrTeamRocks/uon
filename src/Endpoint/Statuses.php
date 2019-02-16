<?php

namespace UON\Endpoint;

use UON\Client;

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
     * @link    https://api.u-on.ru/{key}/status.{_format}
     * @param   array|null $parameters List of parameters
     * @return  array|false
     */
    public function get(array $parameters = [])
    {
        $endpoint = '/status';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get a list of statuses for leads
     *
     * @link    https://api.u-on.ru/{key}/status_lead.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function getLead(array $parameters = [])
    {
        $endpoint = '/status_lead';
        return $this->doRequest('get', $endpoint, $parameters);
    }

}
