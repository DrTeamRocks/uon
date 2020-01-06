<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Collection of methods for work with leads created by users
 *
 * @package UON\Endpoint
 */
class Leads extends Client
{
    /**
     * Create new lead
     *
     * @link https://api.u-on.ru/{key}/lead/create.{_format}
     *
     * @param array $parameters List of parameters [r_id_internal, r_dat, status_id, sources etc.]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'lead/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get leads data by client ID
     *
     * @link https://api.u-on.ru/{key}/lead-by-client/{id}.{_format}
     *
     * @param int $id   Unique lead ID
     * @param int $page Number of page, 1 by default
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getByClient($id, $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'lead-by-client/' . $id . '/' . $page;

        return $this;
    }

    /**
     * Get lead by ID
     *
     * @link https://api.u-on.ru/{key}/lead/{id}.{_format}
     *
     * @param int $id Unique lead ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function get($id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'lead/' . $id;

        return $this;
    }

    /**
     * Get all leads into dates range (and by sources if needed)
     *
     * @link https://api.u-on.ru/{key}/lead/{date_from}/{date_to}.{_format}
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
        $endpoint = '/leads/' . $date_from . '/' . $date_to;
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
     * Get lead data by filters
     *
     * @link https://api.u-on.ru/{key}/lead/search.{_format}
     * @since 1.8.2
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function search(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'lead/search';

        return $this;
    }

}
