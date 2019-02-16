<?php

namespace UON\Endpoint;

use UON\Client;

/**
 * Class Statuses
 *
 * @package UON\Endpoint
 */
class Sources extends Client
{
    /**
     * Create new source
     *
     * @link    https://api.u-on.ru/{key}/source/create.{_format}
     * @param   array $parameters List of parameters
     * @return  array|false
     */
    public function create(array $parameters)
    {
        $endpoint = '/source/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get sources list
     *
     * @link    https://api.u-on.ru/{key}/source.{_format}
     * @return  array|false
     */
    public function all()
    {
        $endpoint = '/source';
        return $this->doRequest('get', $endpoint);
    }
}
