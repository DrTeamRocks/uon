<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Payments
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'payment/create';
        $this->params   = $parameters;

        return $this;
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(string $dateFrom, string $dateTo, $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'payment/list/' . $dateFrom . '/' . $dateTo . '/' . $page;

        return $this;
    }

    /**
     * Get list of all payment views
     *
     * @link https://api.u-on.ru/{key}/payment_form.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function allForms(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'payment_form';

        return $this;
    }

    /**
     * Get list of all other payment types
     *
     * @link https://api.u-on.ru/{key}/payment_other_type.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function allOtherTypes(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'payment_other_type';

        return $this;
    }

    /**
     * Get a single payment
     *
     * @link https://api.u-on.ru/{key}/payment/{id}.{_format}
     *
     * @param int $id Unique payment ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function get(int $id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'payment/' . $id;

        return $this;
    }

    /**
     * Update selected payment by id
     *
     * @link https://api.u-on.ru/{key}/payment/update/{id}.{_format}
     *
     * @param int   $id         Unique payment ID
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update(int $id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'payment/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Delete selected payment from database
     *
     * @link https://api.u-on.ru/{key}/payment/delete/{id}.{_format}
     *
     * @param int $id Unique payment ID
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function delete(int $id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'payment/delete/' . $id;

        return $this;
    }

}
