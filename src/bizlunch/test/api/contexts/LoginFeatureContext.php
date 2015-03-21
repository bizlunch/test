<?php

namespace bizlunch\test\api\contexts;

class LoginFeatureContext extends BaseFeatureContext
{
    /**
     * @Then I save user account :account
     */
    public function saveAccount($account)
    {
        $r = $this->apiGetLastResponse();

        $this->shared->accounts[$account] = $r['data'];
    }

    /**
     * @When I register
     */
    public function iTryToRegister()
    {
        $name = $this->shared->apiClient->getInputData('name');

        if (!empty($name))
        {
            list($f, $l) = explode(' ', $name);

            $this->shared->apiClient->addInputData('name', ['mode' => 'a', 'first' => $f, 'last' => $l]);
        }

        $this->shared->apiClient->post('/auth/register');
    }

    /**
     * @Given basic register information
     */
    public function basicRegisterInformation()
    {
        $this->shared->apiClient   ->addInputData('job', 'My job')
                                    ->addInputData('sector', 'My sector')
                                    ->addInputData('city', 'My city');
    }

}
