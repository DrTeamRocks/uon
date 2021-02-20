<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Payments
 *
 * @package Uon\Endpoint
 */
class Payments extends Client
{
    /**
     * Create new payment
     *
     * @link https://api.u-on.ru/{key}/payment/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'payment/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get full list of payments in dates range
     *
     * @link https://api.u-on.ru/{key}/payment/list/{date_from}/{date_to}.{_format}
     *
     * @param string $dateFrom Start of dates range
     * @param string $dateTo   End of dates range
     * @param int    $page     Number of page, 1 by default
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all(string $dateFrom, string $dateTo, $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'payment/list/' . $dateFrom . '/' . $dateTo . '/' . $page;

        return $this->done();
    }

    /**
     * Get list of all payment views
     *
     * @link https://api.u-on.ru/{key}/payment_form.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function allForms()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'payment_form';

        return $this->done();
    }

    /**
     * Get list of all other payment types
     *
     * @link https://api.u-on.ru/{key}/payment_other_type.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function allOtherTypes()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'payment_other_type';

        return $this->done();
    }

    /**
     * Get a single payment
     *
     * @link https://api.u-on.ru/{key}/payment/{id}.{_format}
     *
     * @param int $id Unique payment ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function get(int $id)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'payment/' . $id;

        return $this->done();
    }

    /**
     * Update selected payment by id
     *
     * @link https://api.u-on.ru/{key}/payment/update/{id}.{_format}
     *
     * @param int   $id         Unique payment ID
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'payment/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Delete selected payment from database
     *
     * @link https://api.u-on.ru/{key}/payment/delete/{id}.{_format}
     *
     * @param int $id Unique payment ID
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function delete(int $id)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'payment/delete/' . $id;

        return $this->done();
    }
}
