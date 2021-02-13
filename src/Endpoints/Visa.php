<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

class Visa extends Client
{
    /**
     * Get list of visa statuses
     *
     * @link https://api.u-on.ru/{key}/visa.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'visa';

        return $this;
    }
}
