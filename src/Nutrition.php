<?php namespace UON;

/**
 * Class Nutrition
 * @package UON
 */
class Nutrition extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * @link https://api.u-on.ru/{key}/nutrition.{_format}
     * @return array
     */
    public function get()
    {
        $endpoint = '/nutrition';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/city/create.{_format}
     * @param array $parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/nutrition/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * @link https://api.u-on.ru/{key}/nutrition/update/{id}.{_format}
     * @param string $id
     * @return array
     */
    public function update($id)
    {
        $endpoint = '/nutrition/update/' . $id;
        return $this->doRequest('post', $endpoint);
    }

}
