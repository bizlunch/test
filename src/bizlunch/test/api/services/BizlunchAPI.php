<?php

namespace bizlunch\test\api\services;

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;

class BizlunchAPI
{
    /**
     * @var Response
     */
    private $lastResponse;

    /**
     * @var array
     */
    private $requestArguments;

    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->client = new Client(['base_url' => 'http://' . TEST_HOST . '/']);

        $this->requestArguments = [];
        $this->lastResponse = null;
    }

    public function addInputData($name, $value)
    {
        $this->requestArguments[$name] = $value;

        return $this;
    }

    public function getInputData($name)
    {
        return isset($this->requestArguments[$name]) ? $this->requestArguments[$name] : null;
    }

    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    public function post($uri, $data = [])
    {
        $data = array_merge($data, $this->requestArguments);

        $response = $this->client->post($uri, [
            'body'      => $data,
            'cookies'   => false
        ]);

        //$status = $response->getStatusCode();

        $this->lastResponse = $response->json();

        return $this->getLastResponse();
    }
}