Feature: login
  In order to access to my Bizlunch account
  As a Bizlunch user
  I need to be able to login with a login/password

Scenario: Login without email and password
  Given I am not logged yet
  When I login as " " with password " "
  Then I sould received the error "Le champs login est requis !"

Scenario: Login with a bad email
    Given I am not logged yet
    When I login as "toto@bizlunch.fr" with password "ldfkldsjfkdsj"
    Then I sould received the error "Compte non trouvé"

Scenario: Login with a bad password
    Given I am not logged yet
    When I login as "thomas@bizlunch.fr" with password "sdflksjfkldjsfklsj"
    Then I sould received the error "Mauvais mot de passe"

Scenario: Login with a good email and password
    Given I am not logged yet
    When I login as "thomas@bizlunch.fr" with password "toto123"
    Then I sould received a success status
    When I call API service "/auth/me"
    Then I sould received a success status

Scenario: Login as Thomas
  Given I am not logged yet
  When I login as "thomas@bizlunch.fr" with password "toto123"
  Then I save user account "thomas"

Scenario: Login as Sandy
  Given I am not logged yet
  When I login as "sandy@bizlunch.fr" with password "toto123"
  Then I save user account "sandy"

Scenario: Login as Géraldine
  Given I am not logged yet
  When I login as "geraldine@bizlunch.fr" with password "toto123"
  Then I save user account "geraldine"
