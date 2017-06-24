<?php namespace UON;

/**
 * Class Suppliers
 * @package UON
 */
class Suppliers extends Client
{
    public function __construct($token)
    {
        parent::__construct();
        $this->token = $token;
    }

    /**
     * Get a list of partners ot
     * @link https://api.u-on.ru/{key}/supplier/{id}.{_format}
     * @param array|null $parameters - List of parameters
     * @return array|false
     */
    public function all($parameters = null)
    {
        $endpoint = '/supplier';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get partner by ID
     * @link https://api.u-on.ru/{key}/supplier.{_format}
     * @param integer $id - ID of partner
     * @param array|null $parameters - List of parameters
     * @return array|false
     */
    public function get($id, $parameters = null)
    {
        $endpoint = '/supplier/' . $id;
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Get a list of partners types
     * @link https://api.u-on.ru/{key}/supplier_type.{_format}
     * @param array|null $parameters - List of parameters
     * @return array|false
     */
    public function getType($parameters = null)
    {
        $endpoint = '/supplier_type';
        return $this->doRequest('get', $endpoint, $parameters);
    }

    /**
     * Add new partner
     * @link https://api.u-on.ru/{key}/supplier/create.{_format}
     * @param array $parameters - List of parameters
     * @return array|false
     */
    public function create($parameters)
    {
        $endpoint = '/supplier/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Create new type for partners
     * @link https://api.u-on.ru/{key}/supplier_type/create.{_format}
     * @param $parameters - List of parameters
     * @return array|false
     */
    public function createType($parameters)
    {
        $endpoint = '/supplier_type/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Update partner by ID
     * @link https://api.u-on.ru/{key}/supplier/update/{id}.{_format}
     * @param integer $id - Unique ID of service
     * @param array $parameters - List of parameters
     * @return array|false
     */
    public function update($id, $parameters)
    {
        $endpoint = '/supplier/update/' . $id;
        return $this->doRequest('post', $endpoint, $parameters);
    }

}
