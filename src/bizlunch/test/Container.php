<?php

namespace bizlunch\test;


use bizlunch\test\services\BizlunchAPI;
use bizlunch\test\services\Testr;

class Container
{
    /**
     * @var \bizlunch\test\services\BizlunchAPI
     */
    public $apiClient;


    /**
     * @var array
     */
    public $accounts = [];

    public function __construct()
    {
        $this->apiClient = new BizlunchAPI();

        (new Testr())->init();
    }
}