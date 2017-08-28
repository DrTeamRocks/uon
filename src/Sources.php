<?php namespace UON;

/**
 * Class Statuses
 * @package UON
 */
class Sources extends Client
{
    /**
     * Create new source
     *
     * @link    https://api.u-on.ru/{key}/source/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/source/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get sources list
     *
     * @link    https://api.u-on.ru/{key}/source.{_format}
     * @param   array|null $parameters - List of parameters
     * @return  array|false
     */
    public function all($parameters = null)
    {
        $endpoint = '/source';
        return $this->doRequest('get', $endpoint, $parameters);
    }
}
