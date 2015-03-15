<?php

namespace bizlunch\test\contexts;

use bizlunch\test\BaseFeatureContext;

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
        $this->apiClient->post($service);
    }

    /**
     * @Then I sould received the error :error
     */
    public function iSouldReceivedTheError($error)
    {
        $apiResponse = $this->apiGetLastResponse();

        if (empty($apiResponse))
        {
            throw new \Exception('The API response is empty!');
        }

        if (!isset($apiResponse['data']['message']))
        {
            throw new \Exception('There is no error message!');
        }

        if ($error !== $apiResponse['data']['message'])
        {
            throw new \Exception('Actual error message is "' . $apiResponse['data']['message'] . '"');
        }
    }
}