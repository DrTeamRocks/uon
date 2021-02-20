<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Chat
 *
 * @package Uon\Endpoint
 */
class Chat extends Client
{
    /**
     * Send message from manager to another manager or tourist
     *
     * @link https://api.u-on.ru/{key}/chat-message/create.{_format}
     *
     * @param array $parameters List of parameters []
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'chat-message/create';
        $this->params   = $parameters;

        return $this->done();
    }
}
