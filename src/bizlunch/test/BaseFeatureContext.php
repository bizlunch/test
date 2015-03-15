<?php

namespace bizlunch\test;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use bizlunch\test\services\BizlunchAPI;
use Foo\Bar\B;

/**
 * Defines application features from the specific context.
 */
class BaseFeatureContext implements Context, SnippetAcceptingContext
{
    static private $apiClientShared;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        if (empty(self::$apiClientShared))
        {
            self::$apiClientShared = new BizlunchAPI();
        }

        $this->apiClient = self::$apiClientShared;
    }

    public function apiAddInputData($name, $value)
    {
        return $this->apiClient->addInputData($name, $value);
    }

    public function apiGetLastResponse()
    {
        return $this->apiClient->getLastResponse();
    }
}
