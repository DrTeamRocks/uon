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
     * GuzzleHttp constructor
     */
    public function __construct()
    {
        $this->_client = new \GuzzleHttp\Client();
    }

    /**
     * Read the file with config
     *
     * @param   string $file Filename
     * @param   bool $autoload Automatically apply the configuration
     * @return  mixed
     */
    public function readConfig($file, $autoload = true)
    {
        if (file_exists($file)) {
            $this->_config = require_once $file;
            if ($autoload === true) $this->loadConfig();
            return $this->_config;
        } else {
            return false;
        }
    }

    /**
     * Parse the incoming config
     */
    public function loadConfig()
    {
        // If _config variable is exist and if this variable is array
        if (!empty($this->_config) && is_array($this->_config)) {
            // Read array and store into values
            foreach ($this->_config as $key => $value) {
                $this->$key = $value;
            }
            return true;
        }
        return false;
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
                $result = $this->_client->get($url);
                break;
            case 'post':
                $result = $this->_client->post($url, $params);
                break;
            case 'delete':
                $result = $this->_client->delete($url, $params);
                break;
            case 'put':
                $result = $this->_client->put($url, $params);
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
