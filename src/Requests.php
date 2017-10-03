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
     * Add file into request
     *
     * @link    https://api.u-on.ru/{key}/request-file/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function createFile($parameters)
    {
        $endpoint = '/request-file/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Add tourist in request
     *
     * @link    https://api.u-on.ru/{key}/tourists-requests/create.{_format}
     * @param   array $parameters - List of parameters [r_id, tourist_id]
     * @return  array|false
     */
    public function createTourist($parameters)
    {
        $endpoint = '/tourists-requests/create';
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
     * Get requests data by client ID
     *
     * @link    https://api.u-on.ru/{key}/request-by-client/create.{_format}
     * @param   int $id - List of parameters
     * @return  array|false
     */
    public function getByClient($id)
    {
        $endpoint = '/request-by-client/' . $id;
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
    public function getDate($date_from, $date_to, $source_id = null)
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
    public function getDateActions($date_from, $date_to)
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
    public function getUpdated($date_from, $date_to)
    {
        $endpoint = '/request/updated/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Update request by request id
     *
     * @link    https://api.u-on.ru/{key}/request/update/{id}.{_format}
     * @param   int $id - Unique ID of request's
     * @param   array $parameters - List of parameters [r_cl_id]
     * @return  array|false
     */
    public function update($id, $parameters)
    {
        $endpoint = '/request/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Delete attached file from request
     *
     * @link    https://api.u-on.ru/{key}/request-file/delete/{id}.{_format}
     * @param   int $id - Unique ID of file
     * @return  array|false
     */
    public function deleteFile($id)
    {
        $endpoint = '/request-file/delete/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Add tourist in request
     *
     * @link    https://api.u-on.ru/{key}/tourists-requests/delete.{_format}
     * @param   array $parameters - List of parameters [r_id, tourist_id]
     * @return  array|false
     */
    public function deleteTourist($parameters)
    {
        $endpoint = '/tourists-requests/delete';
        return $this->doRequest('post', $endpoint, $parameters);
    }
}
