<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Mails
 *
 * @package UON\Endpoints
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'mail/create';
        $this->params   = $parameters;

        return $this;
    }
}