<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Offices
 *
 * @package UON\Endpoints
 * @since   2.0
 */
class Offices extends Client
{
    /**
     * Get the list of all offices
     *
     * @link https://api.u-on.ru/{key}/company-office.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'company-office';

        return $this;
    }
}