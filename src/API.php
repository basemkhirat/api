<?php

namespace Basemkhirat\API;

use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;

/**
 * Class API
 * @package Basemkhirat\API
 */
class API
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var string
     */
    protected $driver = "default";

    /**
     * API constructor.
     * @param array $config
     */
    function __construct($config = [])
    {
        $this->client = new Client($config);
    }

    /**
     * @param string $driver
     * @return $this
     */
    function driver($driver = "default")
    {
        $this->client = new Client(Config::get("api.$driver", []));
        return $this;
    }

    /**
     * @return GuzzleClient object to make raw queries
     */
    function guzzle()
    {
        return $this->client;
    }

    /**
     * @param $method
     * @param string $uri
     * @param array $options
     * @return $this
     */
    public function request($method, $uri = '', array $options = [])
    {
        $this->response = $this->client->request($method, $uri, $options);
        return $this;
    }

    /**
     * @param bool $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($path = false, $config = [])
    {
        return $this->request("GET", $path, $config);
    }

    /**
     * @param bool $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($path = false, $config = [])
    {
        return $this->request("POST", $path, $config);
    }

    /**
     * @param bool $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function put($path = false, $config = [])
    {
        return $this->request("PUT", $path, $config);
    }

    /**
     * @param bool $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function delete($path = false, $config = [])
    {
        return $this->request("DELETE", $path, $config);
    }

    /**
     * Get body content array
     * @return mixed
     */
    public function toArray()
    {
        return json_decode($this->response->getBody()->getContents());
    }

    /**
     * Get body content array
     * @return mixed
     */
    public function getContent()
    {
        return $this->response->getBody()->getContents();
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        } elseif (method_exists($this->response, $name)) {
            return call_user_func_array([$this->response, $name], $arguments);
        }
    }

}