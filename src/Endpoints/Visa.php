<?php

namespace Uon\Endpoints;

use Uon\Client;

class Visa extends Client
{
    /**
     * Get list of visa statuses
     *
     * @link https://api.u-on.ru/{key}/visa.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'visa';

        return $this->done();
    }
}
