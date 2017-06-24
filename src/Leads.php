<?php namespace UON;

/**
 * Class Leads
 * @package UON
 */
class Leads extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Get lead by ID
     * @link https://api.u-on.ru/{key}/lead/create.{_format}
     * @param string $id - Unique lead ID
     * @return array|false
     */
    public function get($id)
    {
        $endpoint = '/lead/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get all leads into dates range (and by sources if needed)
     * @link https://api.u-on.ru/{key}/lead/{date_from}/{date_to}.{_format}
     * @param string $date_from
     * @param string $date_to
     * @param integer|null $source_id - Source ID, eg ID of SMS or JivoSite
     * @return array|false
     */
    public function date($date_from, $date_to, $source_id = null)
    {
        $endpoint = '/lead/' . $date_from . '/' . $date_to;
        if (!empty($source_id)) $endpoint .= '/' . $source_id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Create new lead
     * @link https://api.u-on.ru/{key}/city/create.{_format}
     * @param array $parameters - List of parameters
     * @return array|false
     */
    public function create($parameters)
    {
        $endpoint = '/lead/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
