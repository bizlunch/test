<?php

namespace bizlunch\test\contexts;

use bizlunch\test\BaseFeatureContext;

class InboxFeatureContext extends BaseFeatureContext
{
    /**
     * @When I create a thread with :recipient
     */
    public function iCreateAThreadWith($recipient)
    {
        $this->shared->apiClient->post('/inbox/thread/create', [
            'recipient' => $this->shared->accounts[$recipient]['account']['_id']
        ]);
    }

    /**
     * @Given I have :count thread
     */
    public function iHaveCountThread($count)
    {
        $r = $this->shared->apiClient->post('/inbox/threads');

        $threads = $r['data']['threads'];

        if (count($threads) !== (int) $count)
        {
            throw new \Exception('Actual thread count is ' . count($threads));
        }
    }

    /**
     * @Given I said :message to :recipient
     */
    public function iSendMessageTo($recipient, $message)
    {
        $r = $this->shared->apiClient->post('/inbox/thread/create', [
            'recipient' => $this->shared->accounts[$recipient]['account']['_id']
        ]);

        if ((int) $r['status'] !== 200)
        {
            throw new \Exception('Cannot get thread ID!');
        }

        $this->shared->apiClient->post('/inbox/thread/messages/post', [
            'message'   => $message,
            'thread'    => $r['data'][0]
        ]);
    }


    /**
     * @When I read messages from :author
     */
    public function iReceivedMessageFrom($author)
    {
        $r = $this->shared->apiClient->post('/inbox/thread/create', [
            'recipient' => $this->shared->accounts[$author]['account']['_id']
        ]);

        if ((int) $r['status'] !== 200)
        {
            throw new \Exception('Cannot get thread ID!');
        }

        $this->shared->apiClient->post('/inbox/thread', [
            'thread'    => $r['data'][0]
        ]);
    }

    /**
     * @Then I can see :noun told me :message
     */
    public function iCanSeeTold($message)
    {
        $r = $this->apiGetLastResponse();

        if (!isset($r['data']['messages'][0]['message']))
        {
            throw new \Exception('There is no message in this thread!');
        }

        if ($r['data']['messages'][count($r['data']['messages']) - 1]['message'] !== $message)
        {
            throw new \Exception('Actual message is ' . $r['data']['messages'][count($r['data']['messages']) - 1]['message']);
        }
    }


}