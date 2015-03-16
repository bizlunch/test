Feature: suggest
  In order to contact and invite people
  As a Bizlunch user
  I need to be able to get in touch with them first

Scenario: Give me suggestion
  Given I login as "thomas"
  When I call API service "/suggest/profiles"
  Then I sould received a success status
