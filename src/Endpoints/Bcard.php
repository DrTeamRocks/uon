<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Collection of methods for work with bonus cards
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function activate(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'bcard-activate/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Bonus card create
     *
     * @link https://api.u-on.ru/{key}/bcard/create.{_format}
     *
     * @param array $parameters List of parameters [number, bonuses etc.]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'bcard/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Bonuses add/delete by bonus card
     *
     * @link https://api.u-on.ru/{key}/bcard-bonus/create.{_format}
     *
     * @param array $parameters List of parameters [bc_number, user_id etc.]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createBonus(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'bcard-bonus/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get bonus transactions by bonus card
     *
     * @link https://api.u-on.ru/{key}/bcard-bonus-by-card/{id}.{_format}
     *
     * @param int $id Unique card ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getByCard(int $id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'bcard-bonus-by-card/' . $id;

        return $this;
    }

    /**
     * Get bonus transactions by user ID
     *
     * @link https://api.u-on.ru/{key}/bcard-bonus-by-user/{id}.{_format}
     *
     * @param int $id Unique user ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getByUser(int $id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'bcard-bonus-by-user/' . $id;

        return $this;
    }

}
