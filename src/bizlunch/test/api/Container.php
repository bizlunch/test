<?php

namespace bizlunch\test\api;

use bizlunch\test\api\services\BizlunchAPI;

class Container
{
    /**
     * @var \bizlunch\test\api\services\BizlunchAPI
     */
    public $apiClient;

    /**
     * @var array
     */
    public $accounts = [];

    public function __construct()
    {
        $this->apiClient = new BizlunchAPI();

        //(new Testr())->init();
    }
}