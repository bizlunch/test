Feature: search
  In order to contact and invite people
  As a Bizlunch user
  I need to be able to search them first

Scenario: Search a ghost
  Given I login as "thomas"
  When I search for "kjsdhfdjkshjdshc"
  Then I sould retrieve 0 thing

Scenario: Search Sandy
  Given I login as "thomas"
  When I search for "sandy"
  Then I sould retrieve 1 thing

Scenario: Search a city
  Given I login as "thomas"
  When I search for "Toulon"
  Then I sould retrieve at least 2 things
