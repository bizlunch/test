<?php

namespace bizlunch\test\api\contexts;

class APIFeatureContext extends BaseFeatureContext
{
    /**
     * @Given I set :inputValue as :inputName
     */
    public function setAPIData($inputName, $inputValue)
    {
        $this->apiAddInputData($inputName, $inputValue);
    }

    /**
     * @When I call API service :service
     */
    public function callApiService($service)
    {
        $this->shared->apiClient->post($service);
    }

    /**
     * @Then I sould received the error :error
     */
    public function iSouldReceivedTheError($error)
    {
        $apiResponse = $this->apiGetLastResponse();

        if (!isset($apiResponse['data']['message']))
        {
            throw new \Exception('There is no error message!');
        }

        if ($error !== $apiResponse['data']['message'])
        {
            throw new \Exception('Actual error message is "' . $apiResponse['data']['message'] . '"');
        }
    }

    /**
     * @Then I sould received a success status
     */
    public function iSouldReceivedASuccessStatus()
    {
        $apiResponse = $this->apiGetLastResponse();

        if ((int) $apiResponse['status'] !== 200)
        {
            throw new \Exception('Actual status is "' . $apiResponse['status'] . '" (' . $apiResponse['data']['message'] . ')');
        }
    }

    /**
     * @Then I sould have :count items
     */
    public function iSouldRetrieve($count)
    {
        $apiResponse = $this->apiGetLastResponse();

        if ((int) count($apiResponse['data']) !== (int) $count)
        {
            throw new \Exception('Actual count is ' . count($apiResponse['data']));
        }
    }

}