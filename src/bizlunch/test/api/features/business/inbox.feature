Feature: inbox
  In order to meet Bizlunch user
  As a Bizlunch user
  I need to be able to send and receive messages

Scenario: Create a thread
  Given I login as "thomas"
  And I have 0 thread
  When I said "Hello" to "sandy"
  Then I have 1 thread

Scenario: Sandy receives message
  Given I login as "sandy"
  And I have 1 thread
  When I read messages from "thomas"
  Then I can see he told me "Hello"

Scenario: Sandy receives message
  Given I login as "sandy"
  When I said "How are you ?" to "thomas"
  Then I sould received a success status

Scenario: Thomas receives message
  Given I login as "thomas"
  When I read messages from "sandy"
  Then I can see she told me "How are you ?"