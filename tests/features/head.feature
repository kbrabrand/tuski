Feature: HEAD request
    In order to upload a file
    As a client
    I need to be able to get the offset for the tus resource

    Scenario: Get the offset for a non-existant file
        Given The following files are in my store
            | resourceId | offset | length |
        When I call "HEAD" "/tus/foobar1337"
        Then I should get a response with status code "404"

    Scenario: Get the offset for an existing file
        Given The following files are in my store
            | resourceId | offset | length |
            | foobar1337 | 1337   | 2000   |
        When I call "HEAD" "/tus/foobar1337"
        Then I should get a response with status code "200"
        And I should get a "Offset" header with the value "1337"