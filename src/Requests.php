<?php namespace UON;

/**
 * Class Requests
 * @package UON
 */
class Requests extends Client
{
    /**
     * Create new request
     *
     * @link    https://api.u-on.ru/{key}/request/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/request/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Adding touch to the request
     *
     * @link    https://api.u-on.ru/{key}/request-action/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function createActions($parameters)
    {
        $endpoint = '/request-action/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get request by ID
     *
     * @link    https://api.u-on.ru/{key}/request/{id}.{_format}
     * @param   int $id - Request unique ID
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function get($id, $parameters = null)
    {
        $endpoint = '/request/' . $id;
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get touch of the request by ID
     *
     * @link    https://api.u-on.ru/{key}/request-action/create.{_format}
     * @param   int $id - List of parameters
     * @return  array|false
     */
    public function getActions($id)
    {
        $endpoint = '/request-action/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get requests by dates range (and by source ID)
     *
     * @link    https://api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format}
     * @link    https://api.u-on.ru/{key}/request/{date_from}/{date_to}/{source_id}.{_format}
     * @param   string $date_from
     * @param   string $date_to
     * @param   int|null $source_id - Source ID, eg ID of SMS or JivoSite
     * @return  array|false
     */
    public function date($date_from, $date_to, $source_id = null)
    {
        $endpoint = '/request/' . $date_from . '/' . $date_to;
        if (!empty($source_id)) $endpoint .= '/' . $source_id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get touch of the requests in dates range
     *
     * @link    https://api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format}
     * @param   string $date_from
     * @param   string $date_to
     * @return  array|false
     */
    public function dateActions($date_from, $date_to)
    {
        $endpoint = '/request-action/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get updates requests by dates range
     *
     * @link    https://api.u-on.ru/{key}/request/updated/{date_from}/{date_to}.{_format}
     * @param   string $date_from
     * @param   string $date_to
     * @return  array|false
     */
    public function updated($date_from, $date_to)
    {
        $endpoint = '/request/updated/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

}
