<?php

namespace UON\Endpoint;

use UON\Client;

/**
 * Class Misc
 *
 * @package UON\Endpoint
 */
class Misc extends Client
{
    /**
     * Add flights into voucher
     *
     * @link    https://api.u-on.ru/{key}/avia/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function createAvia(array $parameters)
    {
        $endpoint = '/avia/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Add information about call
     *
     * @link    https://api.u-on.ru/{key}/call_history/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function createCall(array $parameters)
    {
        $endpoint = '/call_history/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Add information about mail item
     *
     * @link    https://api.u-on.ru/{key}/mail/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function createMail(array $parameters)
    {
        $endpoint = '/mail/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get a list of currencies
     *
     * @link    https://api.u-on.ru/{key}/currency.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function getCurrency(array $parameters = [])
    {
        $endpoint = '/currency';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get a list of managers
     *
     * @link    https://api.u-on.ru/{key}/manager.{_format}
     * @return  array|false
     */
    public function getManagers()
    {
        $endpoint = '/manager';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get the list of offices
     *
     * @link    https://api.u-on.ru/{key}/company-office.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function getOffices(array $parameters = [])
    {
        $endpoint = '/company-office';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get reason deny list
     *
     * @link    https://api.u-on.ru/{key}/reason_deny.{_format}
     * @return  array|false
     */
    public function getReasonDeny()
    {
        $endpoint = '/reason_deny';
        return $this->doRequest('get', $endpoint);
    }
}
