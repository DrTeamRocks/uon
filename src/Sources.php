<?php namespace UON;

/**
 * Class Statuses
 * @package UON
 */
class Sources extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Get sources list
     * @link https://api.u-on.ru/{key}/source.{_format}
     * @param null|array $parameters - List of parameters
     * @return array
     */
    public function get($parameters = null)
    {
        $endpoint = '/source';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Create new source
     * @link https://api.u-on.ru/{key}/source/create.{_format}
     * @param array $parameters - List of parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/source/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
