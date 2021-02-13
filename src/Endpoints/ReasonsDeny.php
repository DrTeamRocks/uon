<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class ReasonsDeny
 *
 * @package UON\Endpoints
 * @since   2.0
 */
class ReasonsDeny extends Client
{
    /**
     * Get list of all reason deny
     *
     * @link https://api.u-on.ru/{key}/reason_deny.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'reason_deny';

        return $this;
    }
}
