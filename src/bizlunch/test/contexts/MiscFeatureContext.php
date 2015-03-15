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
        $this->currentInputData = [];
    }
}