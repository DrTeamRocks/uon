<?php namespace UON;

/**
 * Class Lead
 * @package UON
 */
class Lead extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * @link https://api.u-on.ru/{key}/lead/{date_from}/{date_to}.{_format}
     * @param string $date_from
     * @param string $date_to
     * @return array
     */
    public function get($date_from, $date_to)
    {
        $endpoint = '/lead/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/lead/create.{_format}
     * @param string $id
     * @return array
     */
    public function id($id)
    {
        $endpoint = '/lead/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/lead/{date_from}/{date_to}/{source_id}.{_format}
     * @param string $date_from
     * @param string $date_to
     * @param string $source_id
     * @return array
     */
    public function source($date_from, $date_to, $source_id)
    {
        $endpoint = '/lead/' . $date_from . '/' . $date_to . '/' . $source_id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/city/create.{_format}
     * @param array $parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/lead/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
