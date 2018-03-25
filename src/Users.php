<?php namespace UON;

/**
 * Class Users
 * @package UON
 */
class Users extends Client
{
    /**
     * Get all users from database
     *
     * @link    api.u-on.ru/{key}/user.{_format}
     * @return  array|false
     */
    public function all()
    {
        $endpoint = '/user';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get single user by ID
     *
     * @link    https://api.u-on.ru/{key}/user/{id}.{_format}
     * @param   int $id
     * @return  array|false
     */
    public function get($id)
    {
        $endpoint = '/user/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get users by filters
     *
     * @link    https://api.u-on.ru/{key}/user/search.{_format}
     * @param   array $parameters - Some parameters for search [telegram, whatsapp, viber, instagram]
     * @return  array|false
     */
    public function search($parameters = [])
    {
        $endpoint = '/user/search';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get list of user's labels
     *
     * @link    https://api.u-on.ru/{key}/user-label.{_format}
     * @param   array $parameters
     * @return  array|false
     */
    public function getLabel($parameters = [])
    {
        $endpoint = '/user-label';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get single user by phone number
     *
     * @link    https://api.u-on.ru/{key}/user/phone/{phone}.{_format}
     * @param   string $phone
     * @return  array|false
     */
    public function getPhone($phone)
    {
        $endpoint = '/user/phone/' . $phone;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link    https://api.u-on.ru/{key}/user/email.{_format}
     * @param   string $email
     * @return  array|false
     */
    public function getEmail($email)
    {
        $endpoint = '/user/email';
        return $this->doRequest('post', $endpoint, ['email' => $email]);
    }

    /**
     * Get all users. profiles which were updated in the specified date range
     *
     * @link    https://api.u-on.ru/{key}/user/updated/{date_from}/{date_to}.{_format}
     * @param   string $date_from
     * @param   string $date_to
     * @return  array|false
     */
    public function getUpdated($date_from, $date_to)
    {
        $endpoint = '/user/updated/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Create new user in database
     *
     * @link    https://api.u-on.ru/{key}/user/create.{_format}
     * @param   array $parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/user/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Add file into tourists files
     *
     * @link    https://api.u-on.ru/{key}/user-file/create.{_format}
     * @param   array $parameters
     * @return  array|false
     */
    public function createFile($parameters)
    {
        $endpoint = '/user-file/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Update existing user by their ID
     *
     * @link    https://api.u-on.ru/{key}/user/update/{id}.{_format}
     * @param   int $id
     * @param   array $parameters
     * @return  array|false
     */
    public function update($id, $parameters)
    {
        $endpoint = '/user/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
