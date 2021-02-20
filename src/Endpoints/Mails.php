<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Mails
 *
 * @package Uon\Endpoints
 * @since   2.0
 */
class Mails extends Client
{
    /**
     * Add information about mail item
     *
     * @link https://api.u-on.ru/{key}/mail/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'mail/create';
        $this->params   = $parameters;

        return $this->done();
    }
}
