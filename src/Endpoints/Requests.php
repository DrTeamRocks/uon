<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

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
     * @link https://api.u-on.ru/{key}/request/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'request/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Adding touch to the request
     *
     * @link https://api.u-on.ru/{key}/request-action/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createActions(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'request-action/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Add file into request
     *
     * @link https://api.u-on.ru/{key}/request-file/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createFile(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'request-file/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Add tourist in request
     *
     * @link https://api.u-on.ru/{key}/tourists-requests/create.{_format}
     *
     * @param array $parameters List of parameters [r_id, tourist_id]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createTourist(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'tourists-requests/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get requests data by filter
     *
     * @link https://api.u-on.ru/{key}/request/search.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function search(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'request/search';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get request by ID
     *
     * @link https://api.u-on.ru/{key}/request/{id}.{_format}
     *
     * @param int   $id         Request unique ID
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function get($id, array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'request/' . $id;
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get touch of the request by ID
     *
     * @link https://api.u-on.ru/{key}/request-action/create.{_format}
     *
     * @param int $id List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getActions($id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'request-action/' . $id;

        return $this;
    }

    /**
     * Get requests data by client ID
     *
     * @link https://api.u-on.ru/{key}/request-by-client/create.{_format}
     *
     * @param int $id   List of parameters
     * @param int $page Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getByClient($id, $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'request-by-client/' . $id . '/' . $page;

        return $this;
    }

    /**
     * Get requests by dates range (and by source ID)
     *
     * @link https://api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format}
     * @link https://api.u-on.ru/{key}/request/{date_from}/{date_to}/{source_id}.{_format}
     *
     * @param string   $date_from Start of dates range
     * @param string   $date_to   End of dates range
     * @param int      $page      Number of page, 1 by default
     * @param int|null $source_id Source ID, eg ID of SMS or JivoSite
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getDate($date_from, $date_to, $page = 1, $source_id = null): QueryInterface
    {
        $endpoint = '/requests/' . $date_from . '/' . $date_to;
        if (null !== $source_id) {
            $endpoint .= '/' . $source_id;
        }
        $endpoint .= '/' . $page;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Get touch of the requests in dates range
     *
     * @link https://api.u-on.ru/{key}/request/{date_from}/{date_to}.{_format}
     *
     * @param string $date_from Start of dates range
     * @param string $date_to   End of dates range
     * @param int    $page      Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getDateActions($date_from, $date_to, $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'request-action/' . $date_from . '/' . $date_to . '/' . $page;

        return $this;
    }

    /**
     * Get updates requests by dates range
     *
     * @link https://api.u-on.ru/{key}/request/updated/{date_from}/{date_to}.{_format}
     *
     * @param string $date_from Start of dates range
     * @param string $date_to   End of dates range
     * @param int    $page      Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getUpdated($date_from, $date_to, $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'requests/updated/' . $date_from . '/' . $date_to . '/' . $page;

        return $this;
    }

    /**
     * Get all travel types or by some parameters, like id or name
     *
     * @link https://api.u-on.ru/{key}/travel-type.{_format}
     *
     * @param array $parameters List of parameters [id, name]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getTravelType(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'travel-type';

        return $this;
    }

    /**
     * Get filled document from request
     *
     * @link https://api.u-on.ru/{key}/request-document.{_format}
     *
     * @param array $parameters List of parameters [template_id, request_id etc.]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getDocument(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'request-document';

        return $this;
    }

    /**
     * Create new travel type
     *
     * @link https://api.u-on.ru/{key}/travel-type/create.{_format}
     *
     * @param array $parameters List of parameters [name]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createTravelType(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'travel-type/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Update request by request id
     *
     * @link https://api.u-on.ru/{key}/request/update/{id}.{_format}
     *
     * @param int   $id         Unique ID of request's
     * @param array $parameters List of parameters [r_cl_id]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update($id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'request/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Delete attached file from request
     *
     * @link https://api.u-on.ru/{key}/request-file/delete/{id}.{_format}
     *
     * @param int $id Unique ID of file
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function deleteFile($id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'request/delete/' . $id;

        return $this;
    }

    /**
     * Add tourist in request
     *
     * @link https://api.u-on.ru/{key}/tourists-requests/delete.{_format}
     *
     * @param array $parameters List of parameters [r_id, tourist_id]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function deleteTourist(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'tourists-requests/delete';
        $this->params   = $parameters;

        return $this;
    }

}
