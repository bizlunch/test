Feature: misc
  Some misc stuff

Scenario: Login without email and password
  Given I am on "/#/login"
  When I set "t.decaux@bizlunch.fr" as "email"
  And  I set "toto12" as "password"
  And I submit form
  Then I should see error "mauvais mot de passe"