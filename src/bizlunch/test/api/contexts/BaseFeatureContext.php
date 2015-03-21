<?php

namespace bizlunch\test\api\contexts;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use bizlunch\test\Container;
use bizlunch\test\services\BizlunchAPI;

/**
 * Defines application features from the specific context.
 */
class BaseFeatureContext implements Context, SnippetAcceptingContext
{
    static private $__container;

    /**
     * @var \bizlunch\test\Container
     */
    public $shared;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        if (empty(self::$__container))
        {
            self::$__container = new Container();
        }

        $this->shared = self::$__container;

        $this->shared->apiClient->init();
    }

    public function apiAddInputData($name, $value)
    {
        return $this->shared->apiClient->addInputData($name, $value);
    }

    public function apiGetLastResponse()
    {
        $r =  $this->shared->apiClient->getLastResponse();

        if (empty($r))
        {
            throw new \Exception('The API response is empty!');
        }

        return $r;
    }
}
