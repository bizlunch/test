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
        $this->apiClient->setUserToken('');
    }

    /**
     * @Given I am logged
     */
    public function iAmLogged()
    {
        $this->apiClient->setUserToken('HyzwxyND5zCBbWskchtDuQAvYrAXTq01gJfl3GK/Yz6cpRPdBAcEO4fm/RCEjzTTaqAQ13oRsVyYJL2QNJ/RnA==');
    }

}