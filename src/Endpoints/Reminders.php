<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Reminders
 *
 * @package Uon\Endpoint
 */
class Reminders extends Client
{
    /**
     * Create new reminder
     *
     * @link https://api.u-on.ru/{key}/reminder/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'reminder/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get list of all reminder
     *
     * @link https://api.u-on.ru/{key}/reminder/{page}.{_format}
     *
     * @param int $page Unique ID of reminder
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all(int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'reminder/' . $page;

        return $this->done();
    }

    /**
     * Get reminder by id
     *
     * @link https://api.u-on.ru/{key}/reminder/{r_id}.{_format}
     *
     * @param int $id Unique ID of reminder
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function get(int $id)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'reminder/' . $id;

        return $this->done();
    }
}
