<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Users
 *
 * @package Uon\Endpoint
 */
class Users extends Client
{
    /**
     * Get all users from database
     *
     * @link https://api.u-on.ru/{key}/user.{_format}
     *
     * @param int $page Number of page, 1 by default
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all(int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'users/' . $page;

        return $this->done();
    }

    /**
     * Get single user by ID
     *
     * @link https://api.u-on.ru/{key}/user/{id}.{_format}
     *
     * @param int $id
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function get(int $id)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user/' . $id;

        return $this->done();
    }

    /**
     * Get users by filters
     *
     * @link https://api.u-on.ru/{key}/user/search.{_format}
     *
     * @param array $parameters Some parameters for search [telegram, whatsapp, viber, instagram]
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function search(array $parameters = [])
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user/search';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get list of user's labels
     *
     * @link https://api.u-on.ru/{key}/user-label.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getLabel(array $parameters = [])
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user-label';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get single user by phone number
     *
     * @link https://api.u-on.ru/{key}/user/phone/{phone}.{_format}
     *
     * @param string $phone Number of client phone
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getPhone(string $phone)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user/phone/' . $phone;

        return $this->done();
    }

    /**
     * @link https://api.u-on.ru/{key}/user/email.{_format}
     *
     * @param string $email Email of client
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getEmail(string $email)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user/email';
        $this->params   = ['email' => $email];

        return $this->done();
    }

    /**
     * Get all users. profiles which were updated in the specified date range
     *
     * @link https://api.u-on.ru/{key}/user/updated/{date_from}/{date_to}.{_format}
     *
     * @param string $dateFrom Start of dates range
     * @param string $dateTo   End of dates range
     * @param int    $page     Number of page, 1 by default
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function getUpdated(string $dateFrom, string $dateTo, int $page = 1)
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user/updated/' . $dateFrom . '/' . $dateTo . '/' . $page;

        return $this->done();
    }

    /**
     * Create new user in database
     *
     * @link https://api.u-on.ru/{key}/user/create.{_format}
     *
     * @param array $parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Add file into tourists files
     *
     * @link https://api.u-on.ru/{key}/user-file/create.{_format}
     *
     * @param array $parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function createFile(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user-file/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Update existing user by ID
     *
     * @link https://api.u-on.ru/{key}/user/update/{id}.{_format}
     *
     * @param int   $id         ID of client
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function update(int $id, array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user/update/' . $id;
        $this->params   = $parameters;

        return $this->done();
    }
}
