eature: Create Article 

    Background:

        Given an article called "Camera" exists

        And an article called "Television" exists

    Scenario: Create an article Camera

        And I visit the path "/"

        Then I should see the text "Camera"


    Scenario: Create an article Television

        And I visit the path "/"

        Then I should see the text "Television"