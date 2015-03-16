Feature: register
  In order to use Bizlunch
  As a Bizlunch user
  I need to be able to create an account

Scenario: Register without data
  Given I am not logged yet
  When I register
  Then I sould received the error "Le champs email est requis !"

Scenario: Register with wrong email
  Given I am not logged yet
  And basic register information
  When I set "Thomas D." as "name"
  And I set "toto123@gmail" as "email"
  And I set "toto123" as "password"
  And I register
  Then I sould received the error "toto123@gmail n'est pas un email valide !"

Scenario: Register a basic account
  Given I am not logged yet
  And basic register information
  When I set "Thomas D." as "name"
  And I set "basic@bizlunch.fr" as "email"
  And I set "toto123" as "password"
  And I register
  Then I sould received a success status

Scenario: Register an already taken email
  Given I am not logged yet
  And basic register information
  When I set "Thomas D." as "name"
  And I set "Basic@bizlunch.fr" as "email"
  And I set "toto123" as "password"
  And I register
  Then I sould received the error "Cet email est déjà pris!"

Scenario: Register Thomas
  Given I am not logged yet
  And basic register information
  When I set "Thomas D." as "name"
  And I set "thomas@bizlunch.fr" as "email"
  And I set "toto123" as "password"
  And I set "Toulon" as "city"
  And I register
  Then I sould received a success status

Scenario: Register Sandy
  Given I am not logged yet
  And basic register information
  When I set "Sandy N." as "name"
  And I set "sandy@bizlunch.fr" as "email"
  And I set "toto123" as "password"
  And I set "Toulon" as "city"
  And I register
  Then I sould received a success status

Scenario: Register Géraldine
  Given I am not logged yet
  And basic register information
  When I set "Géraldine M." as "name"
  And I set "geraldine@bizlunch.fr" as "email"
  And I set "toto123" as "password"
  And I set "Toulon" as "city"
  And I register
  Then I sould received a success status