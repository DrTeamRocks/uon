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
     * Get all cities by country id
     * @link https://api.u-on.ru/{key}/cities/{country_id}.{_format}
     * @param integer $id_country - Unique ID of country
     * @return array
     */
    public function all($id_country)
    {
        $endpoint = '/cities/' . $id_country;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Create new city in country
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
