<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Misc
 *
 * @package UON\Endpoint
 */
class Misc extends Client
{
    /**
     * Add flights into voucher
     *
     * @link https://api.u-on.ru/{key}/avia/create.{_format}
     *
     * @param array $parameters - List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createAvia(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'avia/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Add information about call
     *
     * @link https://api.u-on.ru/{key}/call_history/create.{_format}
     *
     * @param array $parameters - List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createCall(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'call_history/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Add information about mail item
     *
     * @link https://api.u-on.ru/{key}/mail/create.{_format}
     *
     * @param array $parameters - List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createMail(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'mail/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get a list of currencies
     *
     * @link https://api.u-on.ru/{key}/currency.{_format}
     *
     * @param array $parameters - List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getCurrency(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'currency';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get a list of managers
     *
     * @link https://api.u-on.ru/{key}/manager.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getManagers(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'manager';

        return $this;
    }

    /**
     * Get the list of offices
     *
     * @link https://api.u-on.ru/{key}/company-office.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getOffices(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'company-office';

        return $this;
    }

    /**
     * Get reason deny list
     *
     * @link https://api.u-on.ru/{key}/reason_deny.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getReasonDeny(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'reason_deny';

        return $this;
    }

}
