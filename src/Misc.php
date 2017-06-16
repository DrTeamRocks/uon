<?php namespace UON;

/**
 * Class Misc
 * @package UON
 */
class Misc extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Add flights into voucher
     * @link https://api.u-on.ru/{key}/avia/create.{_format}
     * @param array $parameters - List of parameters
     * @return array
     */
    public function aviaCreate($parameters)
    {
        $endpoint = '/avia/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Add information about call
     * @link https://api.u-on.ru/{key}/call_history/create.{_format}
     * @param array $parameters - List of parameters
     * @return array
     */
    public function callHistoryCreate($parameters)
    {
        $endpoint = '/call_history/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get a list of checkouts
     * @link https://api.u-on.ru/{key}/cash.{_format}
     * @param null|array $parameters - List of parameters
     * @return array
     */
    public function cash($parameters = null)
    {
        $endpoint = '/cash';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get a list of currencies
     * @link https://api.u-on.ru/{key}/currency.{_format}
     * @param null|array $parameters - List of parameters
     * @return array
     */
    public function currency($parameters = null)
    {
        $endpoint = '/currency';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get a list of managers
     * @link https://api.u-on.ru/{key}/manager.{_format}
     * @return array
     */
    public function manager()
    {
        $endpoint = '/manager';
        return $this->doRequest('post', $endpoint);
    }

}
