<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Collection of methods for work with bonus cards
 *
 * @package Uon\Endpoint
 */
class Bcard extends Client
{
    /**
     * @var string
     */
    protected $namespace = __CLASS__;

    /**
     * Bonus card activation
     *
     * @link https://api.u-on.ru/{key}/bcard-activate/create.{_format}
     *
     * @param array $parameters List of parameters [bc_number, user_id]
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function activate(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'bcard-activate/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Bonus card create
     *
     * @link https://api.u-on.ru/{key}/bcard/create.{_format}
     *
     * @param array $parameters List of parameters [number, bonuses etc.]
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'bcard/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Bonuses add/delete by bonus card
     *
     * @link https://api.u-on.ru/{key}/bcard-bonus/create.{_format}
     *
     * @param array $parameters List of parameters [bc_number, user_id etc.]
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function createBonus(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'bcard-bonus/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get bonus transactions by bonus card
     *
     * @link https://api.u-on.ru/{key}/bcard-bonus-by-card/{id}.{_format}
     *
     * @param int $id Unique card ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getByCard(int $id)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'bcard-bonus-by-card/' . $id;

        return $this->done();
    }

    /**
     * Get bonus transactions by user ID
     *
     * @link https://api.u-on.ru/{key}/bcard-bonus-by-user/{id}.{_format}
     *
     * @param int $id Unique user ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getByUser(int $id)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'bcard-bonus-by-user/' . $id;

        return $this->done();
    }
}
