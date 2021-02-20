<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Managers
 *
 * @package Uon\Endpoints
 * @since   2.0
 */
class Managers extends Client
{
    /**
     * Get a list of all managers
     *
     * @link https://api.u-on.ru/{key}/manager.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'manager';

        return $this->done();
    }
}
