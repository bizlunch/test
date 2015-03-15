Feature: login
  In order to access to my Bizlunch account
  As a Bizlunch user
  I need to be able to login with a login/password

Scenario: Login without email and password
  Given I am not logged yet
  When I try to login as " " with password " "
  Then I sould received the error "Le champs login est requis !"

Scenario: Login with a bad email
    Given I am not logged yet
    When I try to login as "ebldy@gmail.com" with password "ldfkldsjfkdsj"
    Then I sould received the error "Compte non trouvé"

Scenario: Login with a bad password
    Given I am not logged yet
    When I try to login as "ebuildy@gmail.com" with password "sdflksjfkldjsfklsj"
    Then I sould received the error "Mauvais mot de passe"

Scenario: Login with a good email and password
    Given I am not logged yet
    When I try to login as "ebuildy@gmail.com" with password "toto123"
    Then I sould received the error "Mauvais mot de passe"