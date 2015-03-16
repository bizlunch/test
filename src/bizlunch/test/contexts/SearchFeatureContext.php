<?php

namespace bizlunch\test\contexts;

use bizlunch\test\BaseFeatureContext;

class SearchFeatureContext extends BaseFeatureContext
{
    /**
     * @When I search for :arg1
     */
    public function iSearchFor($keywords)
    {
        $this->shared->apiClient->post('/data/search', [
            'query' => $keywords
        ]);
    }

    /**
     * @Then I sould retrieve :count thing
     */
    public function iSouldRetrieve($count)
    {
        $apiResponse = $this->apiGetLastResponse();

        if (!isset($apiResponse['data']['total']))
        {
            throw new \Exception('Total field is missing!');
        }

        if ((int) $apiResponse['data']['total'] !== (int) $count)
        {
            throw new \Exception('Actual count is ' . $apiResponse['data']['total']);
        }
    }


    /**
     * @Then I sould retrieve at least :count things
     */
    public function iSouldRetrieveAtLeast($count)
    {
        $apiResponse = $this->apiGetLastResponse();

        if (!isset($apiResponse['data']['total']))
        {
            throw new \Exception('Total field is missing!');
        }

        if ((int) $apiResponse['data']['total'] < (int) $count)
        {
            throw new \Exception('Actual count is ' . $apiResponse['data']['total']);
        }
    }

}