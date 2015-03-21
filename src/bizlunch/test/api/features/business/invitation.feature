Feature: invitation
  In order to meet people
  As a Bizlunch user
  I need to be able to invite them first


Scenario: Create invitation
  Given I login as "thomas"
  When I set "30/03/2015" as "date"
  And I set "10:00" as "message"
  And I set "Is it ok ?" as "message"
  Then I invite "sandy"
  And I invite "geraldine"

Scenario: Sandy receives invitation
  Given I login as "sandy"
  When I call API service "/bizlunch/list"
  Then I should receive invitation from "thomas"

Scenario: Sandy accepts invitation
  Given I login as "sandy"
  When I accept invitation from "thomas"
  Then I sould received a success status

Scenario: Géraldine decilnes invitation
  Given I login as "geraldine"
  When I decline invitation from "thomas"
  Then I sould received a success status