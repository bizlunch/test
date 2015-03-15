Feature: search
  In order to contact and invite people
  As a Bizlunch user
  I need to be able to search them first

Scenario: Search a ghost
  Given I am logged
  When I search for "kjsdhfdjkshjdshc"
  Then I sould retrieve 0 thing

Scenario: Search laitue
  Given I am logged
  When I search for "laitue"
  Then I sould retrieve 1 thing

Scenario: Search a city
  Given I am logged
  When I search for "Toulon"
  Then I sould retrieve at least 50 things
