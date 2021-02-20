<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class ReasonsDeny
 *
 * @package Uon\Endpoints
 * @since   2.0
 */
class ReasonsDeny extends Client
{
    /**
     * Get list of all reason deny
     *
     * @link https://api.u-on.ru/{key}/reason_deny.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'reason_deny';

        return $this->done();
    }
}
