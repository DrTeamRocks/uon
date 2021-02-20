<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Nutrition
 *
 * @package Uon\Endpoint
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
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'nutrition/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get all types of nutrition
     *
     * @link https://api.u-on.ru/{key}/nutrition.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'nutrition';

        return $this->done();
    }

    /**
     * Update type of nutrition by ID
     *
     * @link https://api.u-on.ru/{key}/nutrition/update/{id}.{_format}
     *
     * @param int   $id         Unique nutrition ID
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'nutrition/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }
}
