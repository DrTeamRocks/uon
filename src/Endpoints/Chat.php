<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

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
     * @link https://api.u-on.ru/{key}/chat-message/create.{_format}
     *
     * @param array $parameters List of parameters []
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'chat-message/create';
        $this->params   = $parameters;

        return $this;
    }

}
