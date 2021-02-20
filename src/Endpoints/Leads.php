<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Collection of methods for work with leads created by users
 *
 * @package Uon\Endpoint
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
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'lead/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get leads data by client ID
     *
     * @link https://api.u-on.ru/{key}/lead-by-client/{id}.{_format}
     *
     * @param int $id   Unique lead ID
     * @param int $page Number of page, 1 by default
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getByClient(int $id, int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'lead-by-client/' . $id . '/' . $page;

        return $this->done();
    }

    /**
     * Get lead by ID
     *
     * @link https://api.u-on.ru/{key}/lead/{id}.{_format}
     *
     * @param int $id Unique lead ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function get(int $id)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'lead/' . $id;

        return $this->done();
    }

    /**
     * Get all leads into dates range (and by sources if needed)
     *
     * @link https://api.u-on.ru/{key}/lead/{date_from}/{date_to}.{_format}
     *
     * @param string   $dateFrom Start of dates range
     * @param string   $dateTo   End of dates range
     * @param int      $page     Number of page, 1 by default
     * @param int|null $sourceId Source ID, eg ID of SMS or JivoSite
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getDate(string $dateFrom, string $dateTo, int $page = 1, $sourceId = null)
    {
        $endpoint = 'leads/' . $dateFrom . '/' . $dateTo;
        if (null !== $sourceId) {
            $endpoint .= '/' . $sourceId;
        }
        $endpoint .= '/' . $page;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $endpoint;

        return $this->done();
    }

    /**
     * Get lead data by filters
     *
     * @link  https://api.u-on.ru/{key}/lead/search.{_format}
     * @since 1.8.2
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function search(array $parameters = [])
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'lead/search';
        $this->params   = $parameters;

        return $this->done();
    }
}
