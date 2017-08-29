<?php namespace UON;

/**
 * Class Bcard
 * @package UON
 */
class Bcard extends Client
{
    /**
     * Bonus card activation
     *
     * @link    https://api.u-on.ru/{key}/bcard-activate/create.{_format}
     * @param   array $parameters - List of parameters [bc_number, user_id]
     * @return  array|false
     */
    public function activate($parameters)
    {
        $endpoint = '/bcard-activate/create';
        return $this->doRequest('post', $endpoint, $parameters);
    }

    /**
     * Get bonus transactions by bonus card
     *
     * @link    https://api.u-on.ru/{key}/bcard-bonus-by-card/{id}.{_format}
     * @param   int $id - Unique card ID
     * @return  array|false
     */
    public function getByCard($id)
    {
        $endpoint = '/bcard-bonus-by-card/' . $id;
        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get bonus transactions by user ID
     *
     * @link    https://api.u-on.ru/{key}/bcard-bonus-by-user/{id}.{_format}
     * @param   int $id - Unique user ID
     * @return  array|false
     */
    public function getByUser($id)
    {
        $endpoint = '/bcard-bonus-by-user/' . $id;
        return $this->doRequest('get', $endpoint);
    }

}
