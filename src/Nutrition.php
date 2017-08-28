<?php namespace UON;

/**
 * Class Nutrition
 * @package UON
 */
class Nutrition extends Client
{
    /**
     * Create new nutrition
     *
     * @link    https://api.u-on.ru/{key}/city/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array|false
     */
    public function create($parameters)
    {
        $endpoint = '/nutrition/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get all types of nutrition
     *
     * @link    https://api.u-on.ru/{key}/nutrition.{_format}
     * @return  array|false
     */
    public function all()
    {
        $endpoint = '/nutrition';
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Update type of nutrition by ID
     *
     * @link    https://api.u-on.ru/{key}/nutrition/update/{id}.{_format}
     * @param   int $id - Unique nutrition ID
     * @return  array|false
     */
    public function update($id)
    {
        $endpoint = '/nutrition/update/' . $id;
        return $this->doRequest('post', $endpoint);
    }

}
