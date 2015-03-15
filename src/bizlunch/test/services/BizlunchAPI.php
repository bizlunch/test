<?php

namespace bizlunch\test\services;

use GuzzleHttp\Client;

class BizlunchAPI
{
    private $lastResponse;
    private $requestArguments;
    private $userToken;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function setUserToken($value)
    {
        $this->userToken = $value;
    }

    public function addInputData($name, $value)
    {
        $this->requestArguments[$name] = $value;
    }

    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    public function post($uri, $data = [])
    {
        if (!empty($this->requestArguments) && empty($data))
        {
            $data = $this->requestArguments;
        }

        $response = $this->client->post($this->buildURL($uri), [
            'body' => $data
        ]);

        //$status = $response->getStatusCode();

        $this->lastResponse = $response->json();

        return $this->getLastResponse();
    }

    protected function buildURL($uri)
    {
        return 'http://api.bizlunch.fr/' . $uri;
    }
}