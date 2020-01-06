<?php

namespace UON;

use UON\Interfaces\ClientInterface;

/**
 * @author  Paul Rock <paul@drteam.rocks>
 * @link    http://drteam.rocks
 * @license MIT
 * @package UON
 * @property \UON\Endpoints\Bcard     $bcard      Bonus cards
 * @property \UON\Endpoints\Cash      $cash       Money operations
 * @property \UON\Endpoints\Catalog   $catalog    Catalog of products
 * @property \UON\Endpoints\Chat      $chat       For work with chat messages
 * @property \UON\Endpoints\Cities    $cities     Cities of countries
 * @property \UON\Endpoints\Countries $countries  Work with countries
 * @property \UON\Endpoints\Hotels    $hotels     Hotels methods
 * @property \UON\Endpoints\Leads     $leads      Details about clients
 * @property \UON\Endpoints\Misc      $misc       Optional single methods
 * @property \UON\Endpoints\Nutrition $nutrition  Some methods about eat
 * @property \UON\Endpoints\Payments  $payments   Payment methods
 * @property \UON\Endpoints\Reminders $reminders  Work with reminders
 * @property \UON\Endpoints\Requests  $requests   New requests from people
 * @property \UON\Endpoints\Sources   $sources    All available sources
 * @property \UON\Endpoints\Services  $services   All available sources
 * @property \UON\Endpoints\Statuses  $statuses   Request statuses
 * @property \UON\Endpoints\Suppliers $suppliers  External companies
 * @property \UON\Endpoints\Users     $users      For work with users
 */
class Client implements ClientInterface
{
    use HttpTrait;

    /**
     * @var string
     */
    protected $namespace = __NAMESPACE__ . '\\Endpoints';

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
     * @var mixed
     */
    protected $params;

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
    public function getClient(): ?\GuzzleHttp\Client
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
    public function initClient(array $configs = []): \GuzzleHttp\Client
    {
        return new \GuzzleHttp\Client($configs);
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
        return new $class($this->config);
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

        return call_user_func_array($object, $arguments);
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
     *
     * @throws \ErrorException
     */
    public function __set(string $name, $value)
    {
        self::$variables[$name] = $value;
    }

}
