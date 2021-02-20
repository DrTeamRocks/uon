<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Misc
 *
 * @package    Uon\Endpoint
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
     * @return \Uon\Interfaces\ClientInterface
     * @deprecated Use \Uon\Endpoints\Avia::create(array $parameters) instead
     */
    public function createAvia(array $parameters)
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
     * @return \Uon\Interfaces\ClientInterface
     * @deprecated Use \Uon\Endpoints\CallHistory::create(array $parameters)
     */
    public function createCall(array $parameters)
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
     * @return \Uon\Interfaces\ClientInterface
     * @deprecated Use \Uon\Endpoints\Mail::create(array $parameters)
     */
    public function createMail(array $parameters)
    {
        return $this->mails->create($parameters);
    }

    /**
     * Get a list of currencies
     *
     * https://api.u-on.ru/{key}/currency.{_format}
     *
     * @return \Uon\Interfaces\ClientInterface
     * @deprecated Use \Uon\Endpoints\Currencies::all()
     */
    public function getCurrency()
    {
        return $this->currencies->all();
    }

    /**
     * Get a list of managers
     *
     * https://api.u-on.ru/{key}/manager.{_format}
     *
     * @return \Uon\Interfaces\ClientInterface
     * @deprecated Use \Uon\Endpoints\Managers::all()
     */
    public function getManagers()
    {
        return $this->managers->all();
    }

    /**
     * Get the list of offices
     *
     * https://api.u-on.ru/{key}/company-office.{_format}
     *
     * @return \Uon\Interfaces\ClientInterface
     * @deprecated Use \Uon\Endpoints\Offices::all()
     */
    public function getOffices()
    {
        return $this->offices->all();
    }

    /**
     * Get reason deny list
     *
     * https://api.u-on.ru/{key}/reason_deny.{_format}
     *
     * @return \Uon\Interfaces\ClientInterface
     * @deprecated Use \Uon\Endpoints\ReasonsDeny::all()
     */
    public function getReasonDeny()
    {
        return $this->reasonsDeny->all();
    }

}
