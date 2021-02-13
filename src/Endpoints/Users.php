<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Users
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(int $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'users/' . $page;

        return $this;
    }

    /**
     * Get single user by ID
     *
     * @link https://api.u-on.ru/{key}/user/{id}.{_format}
     *
     * @param int $id
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function get(int $id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user/' . $id;

        return $this;
    }

    /**
     * Get users by filters
     *
     * @link https://api.u-on.ru/{key}/user/search.{_format}
     *
     * @param array $parameters Some parameters for search [telegram, whatsapp, viber, instagram]
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function search(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user/search';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get list of user's labels
     *
     * @link https://api.u-on.ru/{key}/user-label.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getLabel(array $parameters = []): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user-label';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get single user by phone number
     *
     * @link https://api.u-on.ru/{key}/user/phone/{phone}.{_format}
     *
     * @param string $phone Number of client phone
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getPhone(string $phone): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user/phone/' . $phone;

        return $this;
    }

    /**
     * @link https://api.u-on.ru/{key}/user/email.{_format}
     *
     * @param string $email Email of client
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function getEmail(string $email): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user/email';
        $this->params   = ['email' => $email];

        return $this;
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function getUpdated(string $dateFrom, string $dateTo, int $page = 1): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'user/updated/' . $dateFrom . '/' . $dateTo . '/' . $page;

        return $this;
    }

    /**
     * Create new user in database
     *
     * @link https://api.u-on.ru/{key}/user/create.{_format}
     *
     * @param array $parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Add file into tourists files
     *
     * @link https://api.u-on.ru/{key}/user-file/create.{_format}
     *
     * @param array $parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function createFile(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user-file/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Update existing user by ID
     *
     * @link https://api.u-on.ru/{key}/user/update/{id}.{_format}
     *
     * @param int   $id         ID of client
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function update(int $id, array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'user/update/' . $id;
        $this->params   = $parameters;

        return $this;
    }

}
