<?php

namespace bizlunch\test\contexts;


use bizlunch\test\BaseFeatureContext;

class MiscFeatureContext extends BaseFeatureContext
{
    /**
     * @Given I am not logged yet
     */
    public function iAmNotLoggedYet()
    {
        $this->apiAddInputData('access_token', '');
    }

    /**
     * @Given I login as :account
     */
    public function iLoginAs($account)
    {
        if (!isset($this->shared->accounts[$account]))
        {
            throw new \Exception('Account not found!');
        }

        $this->apiAddInputData('access_token', $this->shared->accounts[$account]['session']['token']);
    }


    /**
     * @When I login as :login with password :password
     */
    public function loginWithPassword($login, $password)
    {
        $response = $this->shared->apiClient->post('/auth/login', [
            'login'     => $login,
            'password'  => $password
        ]);

        if (isset($response['data']['session']['token']))
        {
            $this->apiAddInputData('access_token', $response['data']['session']['token']);
        }
    }
}