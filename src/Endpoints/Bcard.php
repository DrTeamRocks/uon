<?php

namespace UON\Endpoints;

use UON\Client;

/**
 * Collection of methods for work with bonus cards
 *
 * @package UON\Endpoint
 */
class Bcard extends Client
{
    /**
     * Bonus card activation
     *
     * @link    https://api.u-on.ru/{key}/bcard-activate/create.{_format}
     *
     * @param array $parameters List of parameters [bc_number, user_id]
     *
     * @return  \UON\Interfaces\ClientInterface;
     */
    public function activate(array $parameters)
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
     * @link    https://api.u-on.ru/{key}/bcard/create.{_format}
     *
     * @param array $parameters List of parameters [number, bonuses etc.]
     *
     * @return  \UON\Interfaces\ClientInterface;
     */
    public function create(array $parameters)
    {
        $endpoint = '/bcard/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Bonuses add/delete by bonus card
     *
     * @link    https://api.u-on.ru/{key}/bcard-bonus/create.{_format}
     *
     * @param array $parameters List of parameters [bc_number, user_id etc.]
     *
     * @return  \UON\Interfaces\ClientInterface;
     */
    public function createBonus(array $parameters)
    {
        $endpoint = '/bcard-bonus/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get bonus transactions by bonus card
     *
     * @link    https://api.u-on.ru/{key}/bcard-bonus-by-card/{id}.{_format}
     *
     * @param int $id Unique card ID
     *
     * @return  \UON\Interfaces\ClientInterface;
     */
    public function getByCard($id)
    {
        $endpoint = '/bcard-bonus-by-card/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get bonus transactions by user ID
     *
     * @link    https://api.u-on.ru/{key}/bcard-bonus-by-user/{id}.{_format}
     *
     * @param int $id Unique user ID
     *
     * @return  \UON\Interfaces\ClientInterface;
     */
    public function getByUser($id)
    {
        $endpoint = '/bcard-bonus-by-user/' . $id;
        return $this->doRequest('get', $endpoint);
    }

}
