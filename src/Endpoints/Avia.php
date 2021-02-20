<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Avia
 *
 * @package Uon\Endpoints
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
     * @return object|\Psr\Http\Message\ResponseInterface|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'avia/create';
        $this->params   = $parameters;

        return $this->done();
    }
}
