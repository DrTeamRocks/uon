<?php namespace UON;

/**
 * Class Statuses
 * @package UON
 */
class Statuses extends Client
{
    /**
     * Get statuses list
     *
     * @link    https://api.u-on.ru/{key}/status.{_format}
     * @param   array|null $parameters - List of parameters
     * @return  array|false
     */
    public function get($parameters = null)
    {
        $endpoint = '/status';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get a list of statuses for leads
     *
     * @link    https://api.u-on.ru/{key}/status_lead.{_format}
     * @param   array|null $parameters - List of parameters
     * @return  array|false
     */
    public function getLead($parameters = null)
    {
        $endpoint = '/status_lead';
        return $this->doRequest('get', $endpoint, $parameters);
    }

}
