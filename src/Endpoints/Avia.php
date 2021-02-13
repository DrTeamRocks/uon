<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Avia
 *
 * @package UON\Endpoints
 * @since   2.0
 */
class Avia extends Client
{
    /**
     * Add flights into voucher
     *
     * @link https://api.u-on.ru/{key}/avia/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'avia/create';
        $this->params   = $parameters;

        return $this;
    }
}