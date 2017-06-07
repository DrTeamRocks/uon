<?php namespace UON;

/**
 * Class User
 * @package UON
 */
class Users extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Show all users or search by username
     * @return  array|false
     */
    public function all()
    {
        $endpoint = '/user';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/user/{id}.{_format}
     * @param string $id
     * @return array|false
     */
    public function id($id)
    {
        $endpoint = '/user/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/user/create.{_format}
     * @param array $parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/user/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * @link https://api.u-on.ru/{key}/user/phone/{phone}.{_format}
     * @param array $phone
     * @return array
     */
    public function phone($phone)
    {
        $endpoint = '/user/phone/' . $phone;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/user/update/{id}.{_format}
     * @param string $id
     * @return array
     */
    public function update($id)
    {
        $endpoint = '/user/update/' . $id;
        return $this->doRequest('post', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/user/updated/{date_from}/{date_to}.{_format}
     * @param string $date_from
     * @param string $date_to
     * @return array|false
     */
    public function updated($date_from, $date_to)
    {
        $endpoint = '/user/updated/' . $date_from . '/' . $date_to;
        return $this->doRequest('get', $endpoint);
    }

}
