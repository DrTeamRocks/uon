<?php namespace UON;

/**
 * Class Requests
 * @package UON
 */
class Requests extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Get request by ID
     * @link https://api.u-on.ru/{key}/request/{id}.{_format}
     * @param integer $id - Request unique ID
     * @param null|array $parameters - List of parameters
     * @return array
     */
    public function get($id, $parameters = null)
    {
        $endpoint = '/request/' . $id;
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get updates requests by dates range
     * @link https://api.u-on.ru/{key}/request/updated/{date_from}/{date_to}.{_format}
     * @param integer $date_from
     * @param integer $date_to
     * @return array
     */
    public function updated($date_from, $date_to)
    {
        $endpoint = '/request/updated/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get requests by dates range (and by source ID)
     * @link https://api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format}
     * @link https://api.u-on.ru/{key}/request/{date_from}/{date_to}/{source_id}.{_format}
     * @param integer $date_from
     * @param integer $date_to
     * @param null|integer $source_id
     * @return array
     */
    public function date($date_from, $date_to, $source_id = null)
    {
        $endpoint = '/request/' . $date_from . '/' . $date_to;
        if (!empty($source_id)) $endpoint .= '/' . $source_id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Create new request
     * @link https://api.u-on.ru/{key}/request/create.{_format}
     * @param null|array $parameters - List of parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/request/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
