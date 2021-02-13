<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Currencies
 *
 * @package UON\Endpoints
 * @since   2.0
 */
class Currencies extends Client
{
    /**
     * Get a list of currencies
     *
     * @link https://api.u-on.ru/{key}/currency.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'currency';

        return $this;
    }
}