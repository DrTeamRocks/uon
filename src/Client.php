<?php

namespace UON;

use UON\Interfaces\ConfigInterface;
use UON\Interfaces\ClientInterface;

/**
 * @author  Paul Rock <paul@drteam.rocks>
 * @link    http://drteam.rocks
 * @license MIT
 * @package UON
 */
class Client implements ClientInterface
{
    /**
     * Initial state of some variables
     */
    protected $_client;
    protected $_config;

    /**
     * Default server parameters
     */
    protected $host = 'api.u-on.ru';
    protected $port = '443';
    protected $path = '/';
    protected $useSSL = true;

    /**
     * User initial values
     */
    protected $token;

    /**
     * Default format of output
     */
    protected $format = 'json';

    /**
     * Client constructor.
     * @param ConfigInterface $config User defined configuration
     */
    public function __construct(ConfigInterface $config)
    {
        // Extract toke from config
        $this->token = $config->get('token');

        // Save config into local variable
        $this->_config = $config;

        // Store the client object
        $this->_client = new \GuzzleHttp\Client($config->getParameters(true));
    }

    /**
     * Make the request and analyze the result
     *
     * @param   string $type Request method
     * @param   string $endpoint Api request endpoint
     * @param   array $params Parameters
     * @param   bool $raw Return data in raw format
     * @return  array|false Array with data or error, or False when something went fully wrong
     * @throws
     */
    public function doRequest($type, $endpoint, array $params = [], $raw = false)
    {
        // Create the base URL
        $base = $this->useSSL ? 'https' : 'http';

        // Generate the URL for request
        $url = $base . '://' . $this->host . ':' . $this->port . $this->path . $this->token . $endpoint . '.' . $this->format;

        //
        $result = \in_array($type, self::ALLOWED_METHODS, false)
            ? $this->_client->request($type, $url, ['form_params' => $params])
            : null;

        return [
            'code' => $result->getStatusCode(),
            'reason' => $result->getReasonPhrase(),
            'message' => $raw ? (string) $result->getBody() : json_decode($result->getBody())
        ];

    }

}
