<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Insurances
 *
 * @package UON\Endpoints
 * @since   2.0
 */
class Insurances extends Client
{
    /**
     * Get a list of insurance statuses
     *
     * @link https://api.u-on.ru/{key}/insurance.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'insurance';

        return $this;
    }
}