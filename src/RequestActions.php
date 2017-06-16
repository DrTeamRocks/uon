<?php namespace UON;

/**
 * Class RequestActions
 * @package UON
 */
class RequestActions extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Get touch of the request by ID
     * @link https://api.u-on.ru/{key}/request-action/create.{_format}
     * @param integer $r_id - List of parameters
     * @return array
     */
    public function get($r_id)
    {
        $endpoint = '/request-action/' . $r_id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get touch of the requests in dates range
     * @link https://api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format}
     * @param $date_from
     * @param $date_to
     * @return array
     */
    public function date($date_from, $date_to)
    {
        $endpoint = '/request-action/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Adding touch to the request
     * @link https://api.u-on.ru/{key}/request-action/create.{_format}
     * @param null|array $parameters - List of parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/request-action/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }


}
