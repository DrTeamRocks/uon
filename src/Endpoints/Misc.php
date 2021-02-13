<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Misc
 *
 * @package    UON\Endpoint
 * @deprecated Will be removed in 2.1
 */
class Misc extends Client
{
    /**
     * Add flights into voucher
     *
     * https://api.u-on.ru/{key}/avia/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     * @deprecated Use \UON\Endpoints\Avia::create(array $parameters) instead
     */
    public function createAvia(array $parameters): QueryInterface
    {
        return $this->avia->create($parameters);
    }

    /**
     * Add information about call
     *
     * https://api.u-on.ru/{key}/call_history/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     * @deprecated Use \UON\Endpoints\CallHistory::create(array $parameters)
     */
    public function createCall(array $parameters): QueryInterface
    {
        return $this->callHistory->create($parameters);
    }

    /**
     * Add information about mail item
     *
     * https://api.u-on.ru/{key}/mail/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     * @deprecated Use \UON\Endpoints\Mail::create(array $parameters)
     */
    public function createMail(array $parameters): QueryInterface
    {
        return $this->mails->create($parameters);
    }

    /**
     * Get a list of currencies
     *
     * https://api.u-on.ru/{key}/currency.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     * @deprecated Use \UON\Endpoints\Currencies::all()
     */
    public function getCurrency(): QueryInterface
    {
        return $this->currencies->all();
    }

    /**
     * Get a list of managers
     *
     * https://api.u-on.ru/{key}/manager.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     * @deprecated Use \UON\Endpoints\Managers::all()
     */
    public function getManagers(): QueryInterface
    {
        return $this->managers->all();
    }

    /**
     * Get the list of offices
     *
     * https://api.u-on.ru/{key}/company-office.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     * @deprecated Use \UON\Endpoints\Offices::all()
     */
    public function getOffices(): QueryInterface
    {
        return $this->offices->all();
    }

    /**
     * Get reason deny list
     *
     * https://api.u-on.ru/{key}/reason_deny.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     * @deprecated Use \UON\Endpoints\ReasonsDeny::all()
     */
    public function getReasonDeny(): QueryInterface
    {
        return $this->reasonsDeny->all();
    }

}
