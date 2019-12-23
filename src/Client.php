<?php

namespace UON;

use GuzzleHttp\Exception\GuzzleException;
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
    protected $host   = 'api.u-on.ru';
    protected $port   = '443';
    protected $path   = '/';
    protected $useSSL = true;

    /**
     * User initial values
     *
     * @var string
     */
    protected $token;

    /**
     * Default format of output
     *
     * @var string
     */
    protected $format = 'json';

    /**
     * Count of tries
     *
     * @var int
     */
    private $tries = self::TRIES;

    /**
     * Waiting time per each try
     *
     * @var int
     */
    private $seconds = self::SECONDS;

    /**
     * Timeout of every try
     *
     * @var float
     */
    private $maxRequestTimeout = self::MAX_REQUEST_TIMEOUT;

    /**
     * Client constructor.
     *
     * @param Config $config User defined configuration
     */
    public function __construct(Config $config)
    {
        // Extract toke from config
        $this->token = $config->get('token');

        // Count of tries
        if ($config->get('tries') !== false) {
            $this->tries = $config->get('tries');
        }

        // Waiting time
        if ($config->get('seconds') !== false) {
            $this->seconds = $config->get('seconds');
        }

        // Max request timeout per try
        if ($config->get('maxRequestTimeout') !== false) {
            $this->maxRequestTimeout = $config->get('maxRequestTimeout');
        }

        // Save config into local variable
        $this->_config = $config;

        // Store the client object
        $this->_client = new \GuzzleHttp\Client($config->getParameters(true));
    }

    /**
     * Request executor with timeout and repeat tries
     *
     * @param   string $type   Request method
     * @param   string $url    endpoint url
     * @param   array  $params List of parameters
     * @return  bool|\Psr\Http\Message\ResponseInterface
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function repeatRequest($type, $url, $params)
    {
        for ($i = 1; $i < $this->tries; $i++) {

            // Execute the request to server
            $result = \in_array($type, self::ALLOWED_METHODS, false)
                ? $this->_client->request($type, $url, ['timeout' => $this->maxRequestTimeout, 'form_params' => $params])
                : null;

            // Check the code status
            $code = $result->getStatusCode();

            // If code is not 405 (but 200 foe example) then exit from loop
            if ($code === 200 || $code === 500) {
                return $result;
            }

            // Waiting in seconds
            sleep($this->seconds);
        }

        // Return false if loop is done but no answer from server
        return false;
    }

    /**
     * Make the request and analyze the result
     *
     * @param   string $type     Request method
     * @param   string $endpoint Api request endpoint
     * @param   array  $params   List of parameters
     * @param   bool   $raw      Return data in raw format
     * @return  mixed|false Array with data or error, or False when something went fully wrong
     */
    public function doRequest($type, $endpoint, array $params = [], $raw = false)
    {
        // Create the base URL
        $base = $this->useSSL ? 'https' : 'http';

        // Generate the URL for request
        $url = $base . '://' . $this->host . ':' . $this->port . $this->path . $this->token . $endpoint . '.' . $this->format;

        try {
            // Execute the request to server
            $result = $this->repeatRequest($type, $url, $params);

            // Return result
            return
                ($result === false)
                    ? false
                    : [
                    'code'    => $result->getStatusCode(),
                    'reason'  => $result->getReasonPhrase(),
                    'message' => $raw ? (string) $result->getBody() : json_decode($result->getBody())
                ];

        } catch (GuzzleException $e) {
            echo $e->getMessage() . "\n";
            echo $e->getTrace();
        }

        return false;
    }

}
