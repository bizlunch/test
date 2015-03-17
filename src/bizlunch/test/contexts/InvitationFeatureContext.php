<?php
namespace bizlunch\test\contexts;


use bizlunch\test\BaseFeatureContext;

class InvitationFeatureContext extends BaseFeatureContext
{
    /**
     * @Then I invite :recipient
     */
    public function launchInvitation($recipient)
    {
        $recipient = $this->shared->accounts[$recipient]['account']['_id'];

        $r = $this->shared->apiClient->post('/bizlunch/insert', [
            'recipients' => [$recipient]
        ]);

        if ((int)$r['status'] !== 200)
        {
            throw new \Exception('Invitation status is ' . $r['status'] . ' (' . $r['data']['message'] . ')');
        }
    }

    /**
     * @Then I should receive invitation from :author
     */
    public function receivedInformationFrom($author)
    {
        $r = $this->apiGetLastResponse();
        $i = $r['data']['invitations'];

        if (count($i) === 0)
        {
            throw new \Exception('There is no invitation!');
        }

        if ($i[0]['author'] !== $this->shared->accounts[$author]['account']['_id'])
        {
            throw new \Exception('Actual author is ' . $i[0]['author']);
        }
    }

    /**
     * @When I :action invitation from :author
     */
    public function actionFrom($author, $action)
    {
        $r = $this->shared->apiClient->post('/bizlunch/list');

        foreach($r['data']['invitations'] as $i)
        {
            if ($i['author'] === $this->shared->accounts[$author]['account']['_id'])
            {
                $this->shared->apiClient->post('/bizlunch/' . $action, [
                    'invitation' => $i['id']
                ]);

                return true;
            }
        }

        throw new \Exception('There is no inviation from ' . $author);
    }
}