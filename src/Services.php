<?php namespace UON;

/**
 * Class Services
 * @package UON
 */
class Services extends Client
{
    /**
     * Add service to voucher
     *
     * @link    https://api.u-on.ru/{key}/request-action/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/service/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get a list of service types for voucher
     *
     * @link    https://api.u-on.ru/{key}/service_type.{_format}
     * @return  array|false
     */
    public function getTypes()
    {
        $endpoint = '/service_type';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Update service by ID
     *
     * @link    https://api.u-on.ru/{key}/service/update/{id}.{_format}
     * @param   int $id - Unique ID of service
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function update($id, $parameters)
    {
        $endpoint = '/service/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
