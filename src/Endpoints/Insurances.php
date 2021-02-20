<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Insurances
 *
 * @package Uon\Endpoints
 * @since   2.0
 */
class Insurances extends Client
{
    /**
     * Get a list of insurance statuses
     *
     * @link https://api.u-on.ru/{key}/insurance.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'insurance';

        return $this->done();
    }
}
