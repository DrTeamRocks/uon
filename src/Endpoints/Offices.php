<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Offices
 *
 * @package Uon\Endpoints
 * @since   2.0
 */
class Offices extends Client
{
    /**
     * Get the list of all offices
     *
     * @link https://api.u-on.ru/{key}/company-office.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'company-office';

        return $this->done();
    }
}
