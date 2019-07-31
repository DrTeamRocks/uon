<?php

namespace UON\Endpoint;

use UON\Client;

/**
 * Class Requests
 *
 * @package UON\Endpoint
 */
class Requests extends Client
{
    /**
     * Create new request
     *
     * @link    https://api.u-on.ru/{key}/request/create.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function create(array $parameters)
    {
        $endpoint = '/request/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Adding touch to the request
     *
     * @link    https://api.u-on.ru/{key}/request-action/create.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function createActions(array $parameters)
    {
        $endpoint = '/request-action/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Add file into request
     *
     * @link    https://api.u-on.ru/{key}/request-file/create.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function createFile(array $parameters)
    {
        $endpoint = '/request-file/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Add tourist in request
     *
     * @link    https://api.u-on.ru/{key}/tourists-requests/create.{_format}
     * @param   array $parameters List of parameters [r_id, tourist_id]
     * @return  array|false
     */
    public function createTourist(array $parameters)
    {
        $endpoint = '/tourists-requests/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get requests data by filter
     *
     * @link    https://api.u-on.ru/{key}/request/search.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function search(array $parameters = [])
    {
        $endpoint = '/request/search';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get request by ID
     *
     * @link    https://api.u-on.ru/{key}/request/{id}.{_format}
     * @param   int   $id         Request unique ID
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function get($id, array $parameters = [])
    {
        $endpoint = '/request/' . $id;
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get touch of the request by ID
     *
     * @link    https://api.u-on.ru/{key}/request-action/create.{_format}
     * @param   int $id List of parameters
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
     * @param   int $id   List of parameters
     * @param   int $page Number of page, 1 by default
     * @return  array|false
     */
    public function getByClient($id, $page = 1)
    {
        $endpoint = '/request-by-client/' . $id . '/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get requests by dates range (and by source ID)
     *
     * @link    https://api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format}
     * @link    https://api.u-on.ru/{key}/request/{date_from}/{date_to}/{source_id}.{_format}
     * @param   string   $date_from Start of dates range
     * @param   string   $date_to   End of dates range
     * @param   int      $page      Number of page, 1 by default
     * @param   int|null $source_id Source ID, eg ID of SMS or JivoSite
     * @return  array|false
     */
    public function getDate($date_from, $date_to, $page = 1, $source_id = null)
    {
        $endpoint = '/requests/' . $date_from . '/' . $date_to;
        if (null !== $source_id) {
            $endpoint .= '/' . $source_id;
        }
        $endpoint .= '/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get touch of the requests in dates range
     *
     * @link    https://api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format}
     * @param   string $date_from Start of dates range
     * @param   string $date_to   End of dates range
     * @param   int    $page      Number of page, 1 by default
     * @return  array|false
     */
    public function getDateActions($date_from, $date_to, $page = 1)
    {
        $endpoint = '/request-action/' . $date_from . '/' . $date_to . '/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get updates requests by dates range
     *
     * @link    https://api.u-on.ru/{key}/request/updated/{date_from}/{date_to}.{_format}
     * @param   string $date_from Start of dates range
     * @param   string $date_to   End of dates range
     * @param   int    $page      Number of page, 1 by default
     * @return  array|false
     */
    public function getUpdated($date_from, $date_to, $page = 1)
    {
        $endpoint = '/requests/updated/' . $date_from . '/' . $date_to . '/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get all travel types or by some parameters, like id or name
     *
     * @link    https://api.u-on.ru/{key}/travel-type.{_format}
     * @param   array $parameters List of parameters [id, name]
     * @return  array|false
     */
    public function getTravelType(array $parameters = [])
    {
        $endpoint = '/travel-type';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get filled document from request
     *
     * @link    https://api.u-on.ru/{key}/request-document.{_format}
     * @param   array $parameters List of parameters [template_id, request_id etc.]
     * @return  array|false
     */
    public function getDocument(array $parameters = [])
    {
        $endpoint = '/request-document';
        return $this->doRequest('post', $endpoint, $parameters, true);
    }

    /**
     * Create new travel type
     *
     * @link    https://api.u-on.ru/{key}/travel-type/create.{_format}
     * @param   array $parameters List of parameters [name]
     * @return  array|false
     */
    public function createTravelType(array $parameters)
    {
        $endpoint = '/travel-type/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Update request by request id
     *
     * @link    https://api.u-on.ru/{key}/request/update/{id}.{_format}
     * @param   int   $id         Unique ID of request's
     * @param   array $parameters List of parameters [r_cl_id]
     * @return  array|false
     */
    public function update($id, array $parameters)
    {
        $endpoint = '/request/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Delete attached file from request
     *
     * @link    https://api.u-on.ru/{key}/request-file/delete/{id}.{_format}
     * @param   int $id Unique ID of file
     * @return  array|false
     */
    public function deleteFile($id)
    {
        $endpoint = '/request-file/delete/' . $id;
        return $this->doRequest('post', $endpoint);
    }

    /**
     * Add tourist in request
     *
     * @link    https://api.u-on.ru/{key}/tourists-requests/delete.{_format}
     * @param   array $parameters List of parameters [r_id, tourist_id]
     * @return  array|false
     */
    public function deleteTourist(array $parameters)
    {
        $endpoint = '/tourists-requests/delete';
        return $this->doRequest('post', $endpoint, $parameters);
    }
}
