<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Nutrition
 *
 * @package UON\Endpoint
 */
class Nutrition extends Client
{
    /**
     * Create new nutrition
     *
     * @link https://api.u-on.ru/{key}/city/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'nutrition/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get all types of nutrition
     *
     * @link https://api.u-on.ru/{key}/nutrition.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'nutrition';

        return $this;
    }

    /**
     * Update type of nutrition by ID
     *
     * @link https://api.u-on.ru/{key}/nutrition/update/{id}.{_format}
     *
     * @param int   $id         Unique nutrition ID
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update(int $id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'nutrition/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

}
