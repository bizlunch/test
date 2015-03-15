<?php

namespace bizlunch\test\contexts;

use bizlunch\test\BaseFeatureContext;

class LoginFeatureContext extends BaseFeatureContext
{
    /**
     * @When I try to login as :login with password :password
     */
    public function loginAs($login, $password)
    {
        $this->apiClient->post('/auth/login', [
            'login'     => $login,
            'password'  => $password
        ]);
    }
}
