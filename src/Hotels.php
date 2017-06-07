<?php namespace UON;

/**
 * Class Hotel
 * @package UON
 */
class Hotels extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * @link https://api.u-on.ru/{key}/hotels/{page}.{_format}
     * @return array
     */
    public function all($page)
    {
        $endpoint = '/hotels/' . $page;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/hotel/{id}.{_format}
     * @param $id
     * @return array|false
     */
    public function id($id)
    {
        $endpoint = '/hotel/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/hotel/delete/{id}.{_format}
     * @param string $id
     * @return array
     */
    public function delete($id)
    {
        $endpoint = '/hotel/delete/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * @link https://api.u-on.ru/{key}/hotel/create.{_format}
     * @param array $parameters
     * @return array
     */
    public function create($parameters)
    {
        $endpoint = '/hotel/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * @link https://api.u-on.ru/{key}/hotel/update/{id}.{_format}
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function update($id, $parameters)
    {
        $endpoint = '/hotel/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
