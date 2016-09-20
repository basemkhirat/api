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
    function driver($driver = "default"){
        $this->client = new Client(Config::get("api.$driver", []));
        return $this;
    }

    /**
     * @return GuzzleClient object to make raw queries
     */
    function guzzle(){
        return $this->client;
    }

    /**
     * @param $method
     * @param $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request($method, $path, $config = []){
        return $this->client->request($method, $path, $config);
    }

    /**
     * @param bool $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($path = false, $config = []){
        return $this->request("GET", $path, $config);
    }

    /**
     * @param bool $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($path = false, $config = []){
        return $this->request("POST", $path, $config);
    }

    /**
     * @param bool $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function put($path = false, $config = []){
        return $this->request("PUT", $path, $config);
    }

    /**
     * @param bool $path
     * @param array $config
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function delete($path = false, $config = []){
        return $this->request("DELETE", $path, $config);
    }



}