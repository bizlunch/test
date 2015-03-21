<?php

namespace bizlunch\test\contexts\browser;


use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use bizlunch\test\Container;

class BaseBrowserContext implements Context, SnippetAcceptingContext
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

        //$this->shared->browser = \RemoteWebDriver::create('http://192.168.59.103:49156/wd/hub/', \DesiredCapabilities::chrome());
        $this->shared->browser = \RemoteWebDriver::createBySessionID('a4571a0b-300f-4fb1-bd0d-0e70de76c634', 'http://192.168.59.103:49156/wd/hub/');
        $this->shared->browser->manage()->timeouts()->implicitlyWait(10);
    }

    /**
     * @Given I am on :url
     */
    public function iAmOn($url)
    {
        $this->shared->browser->get('http://my.bizlunch.fr' . $url);
    }

    /**
     * @When I set :value as :name
     */
    public function iSetInput($name, $value)
    {
        $inputElement = $this->shared->browser->findElement(\WebDriverBy::name($name));

        if (empty($inputElement))
        {
            throw new \Exception('Element "' . $name . '" not found!');
        }

        $inputElement->sendKeys($value);
    }

    /**
     * @When I submit form
     */
    public function iSubmitForm()
    {
        $formElement = $this->shared->browser->findElement(\WebDriverBy::tagName('form'));

        if (empty($formElement))
        {
            throw new \Exception('Element "form" not found!');
        }

        $formElement->submit();
    }

    /**
     * @Then I should see error :error
     */
    public function iShouldSeeError($error)
    {

    }

    public function __destruct()
    {
        //$this->shared->browser->close();
        //$this->shared->browser->quit();
    }

}