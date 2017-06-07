<?php namespace UON;

/**
 * Class Countries
 * @package UON
 */
class Countries extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * @link https://api.u-on.ru/{key}/countries.{_format}
     * @return array
     */
    public function all()
    {
        $endpoint = '/countries';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/country/create.{_format}
     * @param array $parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/country/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * @link https://api.u-on.ru/{key}/country/update/{id}.{_format}
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function update($id, $parameters)
    {
        $endpoint = '/country/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
