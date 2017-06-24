<?php namespace UON;

/**
 * Class Services
 * @package UON
 */
class Services extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Get a list of service types for voucher
     * @link https://api.u-on.ru/{key}/service_type.{_format}
     * @return array
     */
    public function type()
    {
        $endpoint = '/service_type';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Add service to voucher
     * @link https://api.u-on.ru/{key}/request-action/create.{_format}
     * @param array $parameters - List of parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/service/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Update service by ID
     * @link https://api.u-on.ru/{key}/service/update/{id}.{_format}
     * @param integer $id - Unique ID of service
     * @param array $parameters - List of parameters
     * @return array
     */
    public function update($id, $parameters)
    {
        $endpoint = '/service/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
