<?php

namespace Uon;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Uon\Exceptions\UonEmptyResponseException;
use Uon\Exceptions\UonHttpClientException;
use Uon\Exceptions\UonTooManyRequests;
use Uon\Interfaces\ClientInterface;
use function str_replace;
use function strtoupper;
use function ucwords;

/**
 * @author  Paul Rock <paul@drteam.rocks>
 * @link    http://drteam.rocks
 * @license MIT
 * @package Uon
 *
 * @property \Uon\Endpoints\Avia           $avia           Aero transfer
 * @property \Uon\Endpoints\Bcard          $bcard          Bonus cards
 * @property \Uon\Endpoints\CallHistory    $callHistory    History of calls
 * @property \Uon\Endpoints\Cash           $cash           Money operations
 * @property \Uon\Endpoints\Catalog        $catalog        Catalog of products
 * @property \Uon\Endpoints\Chat           $chat           For work with chat messages
 * @property \Uon\Endpoints\Cities         $cities         Cities of countries
 * @property \Uon\Endpoints\Countries      $countries      Work with countries
 * @property \Uon\Endpoints\Currencies     $currencies     Work with currencies
 * @property \Uon\Endpoints\ExtendedFields $extendedFields For manipulation with extended fields
 * @property \Uon\Endpoints\Hotels         $hotels         Hotels methods
 * @property \Uon\Endpoints\Leads          $leads          Details about clients
 * @property \Uon\Endpoints\Mails          $mails          For work with emails
 * @property \Uon\Endpoints\Managers       $managers       Get access to list of managers (sale operators)
 * @property \Uon\Endpoints\Misc           $misc           Optional single methods
 * @property \Uon\Endpoints\Notifications  $notifications  For creating new notifications for managers
 * @property \Uon\Endpoints\Nutrition      $nutrition      Some methods about eat
 * @property \Uon\Endpoints\Offices        $offices        Get access to list of all offices
 * @property \Uon\Endpoints\Payments       $payments       Payment methods
 * @property \Uon\Endpoints\ReasonsDeny    $reasonsDeny    List of all deny reasons
 * @property \Uon\Endpoints\Reminders      $reminders      Work with reminders
 * @property \Uon\Endpoints\Requests       $requests       New requests from people
 * @property \Uon\Endpoints\Services       $services       All available services
 * @property \Uon\Endpoints\Sources        $sources        All available sources
 * @property \Uon\Endpoints\Statuses       $statuses       Request statuses
 * @property \Uon\Endpoints\Suppliers      $suppliers      External companies
 * @property \Uon\Endpoints\Users          $users          For work with users
 * @property \Uon\Endpoints\Visa           $visa           For work with visa statuses
 * @property \Uon\Endpoints\Webhooks       $webhooks       Webhooks management
 */
class Client implements ClientInterface
{
    /**
     * @var string
     */
    protected $namespace = __NAMESPACE__ . '\\Endpoints';

    /**
     * Initial state of some variables
     *
     * @var null|\GuzzleHttp\Client
     */
    public $client;

    /**
     * Object of main config
     *
     * @var \Uon\Config
     */
    public $config;

    /**
     * Type of query
     *
     * @var string
     */
    protected $type;

    /**
     * Endpoint of query
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Parameters of query
     *
     * @var array
     */
    protected $params = [];

    /**
     * @var array
     */
    protected static $variables = [];

    /**
     * API constructor.
     *
     * @param array|\Uon\Config $config
     * @param bool              $init
     *
     * @throws \ErrorException
     */
    public function __construct($config, bool $init = true)
    {
        if (!$config instanceof Config) {
            $config = new Config($config);
        }

        // Save config into local variable
        $this->config = $config;

        // Init if need
        if ($init) {
            $this->client = $this->initClient($config->guzzle());
        }
    }

    /**
     * Get current client instance
     *
     * @return null|\GuzzleHttp\Client
     */
    public function getClient(): ?HttpClient
    {
        return $this->client;
    }

    /**
     * Store the client object
     *
     * @param array $configs
     *
     * @return \GuzzleHttp\Client
     */
    public function initClient(array $configs = []): HttpClient
    {
        return new HttpClient($configs);
    }

    /**
     * Convert underscore_strings to camelCase (medial capitals).
     *
     * @param string $str
     *
     * @return string
     */
    private function snakeToPascal(string $str): string
    {
        // Remove underscores, capitalize words, squash, lowercase first.
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
    }

    /**
     * Magic method required for call of another classes
     *
     * @param string $name
     *
     * @return bool|object
     */
    public function __get(string $name)
    {
        if (isset(self::$variables[$name])) {
            return self::$variables[$name];
        }

        // Set class name as namespace
        $class = $this->namespace . '\\' . $this->snakeToPascal($name);

        // Try to create object by name
        return new $class($this->config);
    }

    /**
     * Check if class is exist in folder
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return isset(self::$variables[$name]);
    }

    /**
     * Ordinary dummy setter, it should be ignored (added to PSR reasons)
     *
     * @param string $name
     * @param mixed  $value
     */
    public function __set(string $name, $value)
    {
        self::$variables[$name] = $value;
    }

    /**
     * Request executor with timeout and repeat tries
     *
     * @param string $type   Request method
     * @param string $url    endpoint url
     * @param array  $params List of parameters
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \Uon\Exceptions\UonTooManyRequests
     * @throws \Uon\Exceptions\UonParameterNotSetException
     * @throws \Uon\Exceptions\UonHttpClientException
     */
    private function repeatRequest(string $type, string $url, array $params = []): ?ResponseInterface
    {
        $type = strtoupper($type);

        for ($i = 1; $i <= $this->config->get('tries'); $i++) {

            $requestEndpoint =
                $this->config->get('base_uri') . '/'
                . $this->config->get('token') . '/'
                . $url . '.' . $this->config->get('format');

            if ($this->config->get('verbose')) {
                var_dump('[' . $type . '] endpoint:' . $requestEndpoint . ' parameters:' . json_encode($params));
            }

            try {

                if (empty($params)) {
                    // Execute the request to server
                    $result = $this->client->request($type, $requestEndpoint);
                } else {
                    // Execute the request to server
                    $result = $this->client->request($type, $requestEndpoint, [RequestOptions::FORM_PARAMS => $params]);
                }

                // Check the code status
                $code = $result->getStatusCode();

                // If success response from server
                if ($code === 200 || $code === 201) {
                    return $result;
                }

                // If not "too many requests", then probably some bug on remote or our side
                if ($code !== 429) {
                    throw new UonTooManyRequests();
                }

            } catch (GuzzleException $exception) {
                throw new UonHttpClientException($exception);
            }

            // Waiting in seconds
            sleep($this->config->get('seconds'));
        }

        // Return false if loop is done but no answer from server
        return null;
    }

    /**
     * Execute request and return response
     *
     * @return null|object Array with data or NULL if error
     *
     * @throws \Uon\Exceptions\UonEmptyResponseException
     * @throws \Uon\Exceptions\UonTooManyRequests
     * @throws \Uon\Exceptions\UonHttpClientException
     */
    public function exec()
    {
        return $this->doRequest($this->type, $this->endpoint, $this->params);
    }

    /**
     * Execute query and return RAW response from remote API
     *
     * @return null|\Psr\Http\Message\ResponseInterface RAW response or NULL if error
     *
     * @throws \Uon\Exceptions\UonEmptyResponseException
     * @throws \Uon\Exceptions\UonTooManyRequests
     * @throws \Uon\Exceptions\UonHttpClientException
     */
    public function raw(): ?ResponseInterface
    {
        return $this->doRequest($this->type, $this->endpoint, $this->params, true);
    }

    /**
     * Make the request and analyze the result
     *
     * @param string $type            Request method
     * @param string $requestEndpoint Api request endpoint
     * @param mixed  $params          List of parameters
     * @param bool   $raw             Return data in raw format
     *
     * @return null|object|ResponseInterface Array with data, RAW response or NULL if error
     *
     * @throws \Uon\Exceptions\UonEmptyResponseException If empty response received from U-On
     * @throws \Uon\Exceptions\UonTooManyRequests If amount or repeats is more than allowed
     * @throws \Uon\Exceptions\UonHttpClientException If http exception occurred
     */
    private function doRequest(string $type, string $requestEndpoint, array $params = [], bool $raw = false)
    {
        // Execute the request to server
        $result = $this->repeatRequest($type, $requestEndpoint, $params);

        // If debug then return Guzzle object
        if ($this->config->get('debug') === true) {
            return $result;
        }

        if (null === $result) {
            throw new UonEmptyResponseException();
        }

        // Return RAW result if required
        if ($raw) {
            return $result;
        }

        return json_decode($result->getBody(), false);
    }

    /**
     * @since 2.0
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     *
     * @throws \Uon\Exceptions\UonEmptyResponseException
     * @throws \Uon\Exceptions\UonHttpClientException
     * @throws \Uon\Exceptions\UonTooManyRequests
     */
    protected function done()
    {
        return $this->config->get('auto_exec') ? $this->exec() : $this;
    }
}
