<?php namespace UON;

/**
 * Class Cities
 * @package UON
 */
class Cities extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * @link https://api.u-on.ru/{key}/cities/{country_id}.{_format}
     * @return array
     */
    public function all()
    {
        $endpoint = '/cities';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/city/create.{_format}
     * @param array $parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/city/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * @link https://api.u-on.ru/{key}/city/update/{id}.{_format}
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function update($id, $parameters)
    {
        $endpoint = '/city/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
