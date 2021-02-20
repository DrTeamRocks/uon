<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Currencies
 *
 * @package Uon\Endpoints
 * @since   2.0
 */
class Currencies extends Client
{
    /**
     * Get a list of currencies
     *
     * @link https://api.u-on.ru/{key}/currency.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'currency';

        return $this->done();
    }
}
