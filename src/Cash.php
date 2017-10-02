<?php namespace UON;

/**
 * Class Cash
 * @package UON
 */
class Cash extends Client
{
    /**
     * Get a list of checkouts
     *
     * @link    https://api.u-on.ru/{key}/cash.{_format}
     * @param   array $parameters - List of parameters ['id', 'name', 'name_en']
     * @return  array|false
     */
    public function get($parameters = array())
    {
        $endpoint = '/cash';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Add new cashbox
     *
     * @link    https://api.u-on.ru/{key}/cash/create.{_format}
     * @param   array $parameters - List of parameters ['name']
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/cash/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }
}
