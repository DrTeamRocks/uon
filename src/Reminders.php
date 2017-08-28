<?php namespace UON;

/**
 * Class Reminders
 * @package UON
 */
class Reminders extends Client
{
    /**
     * Create new reminder
     *
     * @link    https://api.u-on.ru/{key}/reminder/create.{_format}
     * @param   array $parameters - List of parameters
     * @return  array
     */
    public function create($parameters)
    {
        $endpoint = '/reminder/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get reminder by id
     *
     * @link    https://api.u-on.ru/{key}/reminder/{r_id}.{_format}
     * @param   int $id - Unique ID of reminder
     * @return  array|false
     */
    public function get($id)
    {
        $endpoint = '/reminder/' . $id;
        return $this->doRequest('get', $endpoint);
    }

}
