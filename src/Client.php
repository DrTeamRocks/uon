<?php

namespace UON;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use UON\Exceptions\UonEmptyResponseException;
use UON\Exceptions\UonTooManyRequests;
use UON\Interfaces\QueryInterface;

/**
 * @author  Paul Rock <paul@drteam.rocks>
 * @link    http://drteam.rocks
 * @license MIT
 * @package UON
 *
 * @property \UON\Endpoints\Avia           $avia           Aero transfer
 * @property \UON\Endpoints\Bcard          $bcard          Bonus cards
 * @property \UON\Endpoints\CallHistory    $callHistory    History of calls
 * @property \UON\Endpoints\Cash           $cash           Money operations
 * @property \UON\Endpoints\Catalog        $catalog        Catalog of products
 * @property \UON\Endpoints\Chat           $chat           For work with chat messages
 * @property \UON\Endpoints\Cities         $cities         Cities of countries
 * @property \UON\Endpoints\Countries      $countries      Work with countries
 * @property \UON\Endpoints\Currencies     $currencies     Work with currencies
 * @property \UON\Endpoints\ExtendedFields $extendedFields For manipulation with extended fields
 * @property \UON\Endpoints\Hotels         $hotels         Hotels methods
 * @property \UON\Endpoints\Leads          $leads          Details about clients
 * @property \UON\Endpoints\Mails          $mails          For work with emails
 * @property \UON\Endpoints\Managers       $managers       Get access to list of managers (sale operators)
 * @property \UON\Endpoints\Misc           $misc           Optional single methods
 * @property \UON\Endpoints\Notifications  $notifications  For creating new notifications for managers
 * @property \UON\Endpoints\Nutrition      $nutrition      Some methods about eat
 * @property \UON\Endpoints\Offices        $offices        Get access to list of all offices
 * @property \UON\Endpoints\Payments       $payments       Payment methods
 * @property \UON\Endpoints\ReasonsDeny    $reasonsDeny    List of all deny reasons
 * @property \UON\Endpoints\Reminders      $reminders      Work with reminders
 * @property \UON\Endpoints\Requests       $requests       New requests from people
 * @property \UON\Endpoints\Services       $services       All available services
 * @property \UON\Endpoints\Sources        $sources        All available sources
 * @property \UON\Endpoints\Statuses       $statuses       Request statuses
 * @property \UON\Endpoints\Suppliers      $suppliers      External companies
 * @property \UON\Endpoints\Users          $users          For work with users
 * @property \UON\Endpoints\Visa           $visa           For work with visa statuses
 * @property \UON\Endpoints\Webhooks       $webhooks       Webhooks management
 */
class Client implements QueryInterface
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
     * @var \UON\Config
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
     * @param array|\UON\Config $config
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
     * @throws \ErrorException
     */
    public function __get(string $name)
    {
        if (isset(self::$variables[$name])) {
            return self::$variables[$name];
        }

        // Set class name as namespace
        $class = $this->namespace . '\\' . $this->snakeToPascal($name);

        // Try to create object by name
        $object = new $class($this->config);

        return $this->config->get('auto_exec') ? $object->exec() : $object;
    }

    /**
     * Magic method required for call of another classes
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return bool|object
     * @throws \ErrorException
     */
    public function __call(string $name, array $arguments)
    {
        // Set class name as namespace
        $class = $this->namespace . '\\' . $this->snakeToPascal($name) . 's';

        // Try to create object by name
        $object = new $class($this->config);

        // Call user function from endpoint class
        $func = call_user_func_array($object, $arguments);

        dd($func->exec());

        return $this->config->get('auto_exec') ? $func->exec() : $func;
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
     * @throws \ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function repeatRequest(string $type, string $url, array $params = []): ?ResponseInterface
    {
        $type = strtoupper($type);

        for ($i = 1; $i <= $this->config->get('tries'); $i++) {

            $requestEndpoint =
                $this->config->get('base_uri')
                . '/'
                . $this->config->get('token')
                . '/'
                . $url
                . '.'
                . $this->config->get('format');

            if ($this->config->get('verbose')) {
                error_log('[' . $type . '] endpoint:' . $requestEndpoint . ' parameters:' . json_encode($params));
            }

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
     */
    public function exec()
    {
        return $this->doRequest($this->type, $this->endpoint, $this->params);
    }

    /**
     * Execute query and return RAW response from remote API
     *
     * @return null|\Psr\Http\Message\ResponseInterface RAW response or NULL if error
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
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

}
