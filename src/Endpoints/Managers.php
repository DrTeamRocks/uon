<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Managers
 *
 * @package UON\Endpoints
 * @since   2.0
 */
class Managers extends Client
{
    /**
     * Get a list of all managers
     *
     * @link https://api.u-on.ru/{key}/manager.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'manager';

        return $this;
    }
}