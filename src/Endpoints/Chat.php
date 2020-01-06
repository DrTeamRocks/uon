<?php

namespace UON\Endpoints;

use UON\Client;

/**
 * Class Chat
 *
 * @package UON\Endpoint
 */
class Chat extends Client
{
    /**
     * Send message from manager to another manager or tourist
     *
     * @link    https://api.u-on.ru/{key}/chat-message/create.{_format}
     * @param   array $parameters List of parameters []
     * @return  array|false
     */
    public function create(array $parameters)
    {
        $endpoint = '/chat-message/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }
}
