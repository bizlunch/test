<?php

namespace bizlunch\test\services;

use GuzzleHttp\Client;

class BizlunchAPI
{
    public function __construct()
    {
        $this->client = new Client();
    }

    public function post($uri, $data = [])
    {
        $response = $this->client->post($this->buildURL($uri), [], $data);

        //$status = $response->getStatusCode();

        return $response->json();
    }

    protected function buildURL($uri)
    {
        return 'http://api.bizlunch.fr/' . $uri;
    }
}