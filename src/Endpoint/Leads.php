<?php

namespace UON\Endpoint;

use UON\Client;

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
     * @link    https://api.u-on.ru/{key}/lead/create.{_format}
     * @param   array $parameters List of parameters [r_id_internal, r_dat, status_id, sources etc.]
     * @return  array|false
     */
    public function create(array $parameters)
    {
        $endpoint = '/lead/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get leads data by client ID
     *
     * @link    https://api.u-on.ru/{key}/lead-by-client/{id}.{_format}
     * @param   int $id   Unique lead ID
     * @param   int $page Number of page, 1 by default
     * @return  array|false
     */
    public function getByClient($id, $page = 1)
    {
        $endpoint = '/lead-by-client/' . $id . '/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get lead by ID
     *
     * @link    https://api.u-on.ru/{key}/lead/{id}.{_format}
     * @param   int $id Unique lead ID
     * @return  array|false
     */
    public function get($id)
    {
        $endpoint = '/lead/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get all leads into dates range (and by sources if needed)
     *
     * @link    https://api.u-on.ru/{key}/lead/{date_from}/{date_to}.{_format}
     * @param   string   $date_from Start of dates range
     * @param   string   $date_to   End of dates range
     * @param   int      $page      Number of page, 1 by default
     * @param   int|null $source_id Source ID, eg ID of SMS or JivoSite
     * @return  array|false
     */
    public function getDate($date_from, $date_to, $page = 1, $source_id = null)
    {
        $endpoint = '/leads/' . $date_from . '/' . $date_to;
        if (null !== $source_id) {
            $endpoint .= '/' . $source_id;
        }
        $endpoint .= '/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get lead data by filters
     *
     * @link    https://api.u-on.ru/{key}/lead/search.{_format}
     * @since   1.8.2
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function search(array $parameters = [])
    {
        $endpoint = '/lead/search';
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
