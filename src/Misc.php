<?php namespace UON;

/**
 * Class Misc
 * @package UON
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
    public function createAvia($parameters)
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
    public function createCall($parameters)
    {
        $endpoint = '/call_history/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get a list of checkouts
     *
     * @link    https://api.u-on.ru/{key}/cash.{_format}
     * @param   null|array $parameters - List of parameters
     * @return  array|false
     */
    public function getCash($parameters = null)
    {
        $endpoint = '/cash';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get a list of currencies
     *
     * @link    https://api.u-on.ru/{key}/currency.{_format}
     * @param   null|array $parameters - List of parameters
     * @return  array|false
     */
    public function getCurrency($parameters = null)
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

}
