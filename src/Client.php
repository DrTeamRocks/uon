<?php namespace UON;
/**
 * @author Paul Rock <paul@drteam.rocks>
 * @link http://drteam.rocks
 * @license MIT
 */

class Client
{
    /**
     * Initial state of some variables
     */
    public $_client;
    public $_config;

    /**
     * Default server parameters
     */
    public $host = 'api.u-on.ru';
    public $port = '443';
    public $path = '/';
    public $useSSL = true;

    /**
     * User initial values
     */
    public $token;

    /**
     * Default format of output
     */
    public $format = 'json';

    /**
     * Client constructor.
     * @param null|string $token - User defined token
     */
    public function __construct($token = null)
    {
        // If token is not empty
        if (!empty($token)) $this->token = $token;

        // Store the client object
        $this->_client = new \GuzzleHttp\Client();
    }

    /**
     * Make the request and analyze the result
     *
     * @param   string $type Request method
     * @param   string $endpoint Api request endpoint
     * @param   array $params Parameters
     * @return  array|false Array with data or error, or False when something went fully wrong
     */
    public function doRequest($type, $endpoint, $params = array())
    {
        // Create the base URL
        $base = ($this->useSSL) ? "https" : "http";

        // Generate the URL for request
        $url = $base . "://" . $this->host . ":" . $this->port . $this->path . $this->token . $endpoint . '.' . $this->format;

        switch ($type) {
            case 'get':
            case 'post':
            case 'delete':
            case 'put':
                $result = $this->_client->request($type, $url, array('form_params' => $params));
                break;
            default:
                $result = null;
                break;
        }

        if ($result->getStatusCode() == 200 || $result->getStatusCode() == 201) {
            return array('status' => true, 'message' => json_decode($result->getBody()));
        }

        return array('status' => false, 'message' => json_decode($result->getBody()));

    }

}
