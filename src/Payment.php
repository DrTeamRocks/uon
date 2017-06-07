<?php namespace UON;

/**
 * Class Payment
 * @package UON
 */
class Payment extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * @link https://api.u-on.ru/{key}/payment/create.{_format}
     * @param array $parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/payment/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * @link https://api.u-on.ru/{key}/payment/delete/{id}.{_format}
     * @param array $id
     * @return array
     */
    public function delete($id)
    {
        $endpoint = '/payment/delete/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/payment/list/{date_from}/{date_to}.{_format}
     * @param string $date_from
     * @param string $date_to
     * @return array
     */
    public function list($date_from, $date_to)
    {
        $endpoint = '/payment/list';
        return $this->doRequest('post', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/payment/{id}.{_format}
     * @param array $id
     * @return array
     */
    public function get($id)
    {
        $endpoint = '/payment/' . $id;
        return $this->doRequest('post', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/payment/update/{id}.{_format}
     * @param string $id
     * @param string $parameters
     * @return array
     */
    public function update($id, $parameters)
    {
        $endpoint = '/payment/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
