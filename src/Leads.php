<?php namespace UON;

/**
 * Class Leads
 * @package UON
 */
class Leads extends Client
{
    /**
     * Create new lead
     *
     * @link    https://api.u-on.ru/{key}/lead/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/lead/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get leads data by client ID
     *
     * @link    https://api.u-on.ru/{key}/lead-by-client/{id}.{_format}
     * @param   int $id - Unique lead ID
     * @return  array|false
     */
    public function getByClient($id)
    {
        $endpoint = '/lead-by-client/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get lead by ID
     *
     * @link    https://api.u-on.ru/{key}/lead/{id}.{_format}
     * @param   int $id - Unique lead ID
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
     * @param   string $date_from
     * @param   string $date_to
     * @param   int|null $source_id - Source ID, eg ID of SMS or JivoSite
     * @return  array|false
     */
    public function date($date_from, $date_to, $source_id = null)
    {
        $endpoint = '/lead/' . $date_from . '/' . $date_to;
        if (!empty($source_id)) $endpoint .= '/' . $source_id;
        return $this->doRequest('get', $endpoint);
    }

}
