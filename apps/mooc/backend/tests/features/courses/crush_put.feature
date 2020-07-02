Feature: Create a new crush
  In order to have crushes on the platform
  As a user with admin permissions
  I want to create a new crush

  Scenario: A valid non existing crush
    Given I send a PUT request to "/crushes/1aab45ba-3c7a-4344-8936-78466eca77fa" with body:
    """
    {
      "name": "The best crush"
    }
    """
    Then the response status code should be 201
    And the response should be empty
