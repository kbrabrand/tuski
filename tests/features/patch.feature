Feature: PATCH request
    In order to upload a file
    As a client
    I need to be able to send data chunks to the tus endpoint

    Scenario: Invalid content type
        Given My request has the content type "application/foobar"
        When I call "PATCH" "/tus/foobar1337"
        Then I should get a response with status code "400"

    Scenario: Missing offset
        Given My request has the correct content type
        And My request has no "Offset" header
        When I call "PATCH" "/tus/foobar1337"
        Then I should get a response with status code "400"

    Scenario: Missing content length
        Given My request has the correct content type
        And My request has a "Offset" header with the value "10"
        And My request has no "Content-Length" header
        When I call "PATCH" "/tus/foobar1337"
        Then I should get a response with status code "400"

    Scenario: Negative offset
        Given My request has the correct content type
        And My request has an offset of "-10" and length of "10"
        When I call "PATCH" "/tus/foobar1337"
        Then I should get a response with status code "400"

    Scenario: Negative content length
        Given My request has the correct content type
        And My request has an offset of "10" and length of "-10"
        When I call "PATCH" "/tus/foobar1337"
        Then I should get a response with status code "400"

    Scenario: Content length + offset is larger than the file entity length
        Given The following files are in my store
            | resourceId | offset | length |
            | foobar1337 | 30     | 100    |
        And My request has the correct content type
        And My request has an offset of "30" and length of "80"
        And My request contains "80" bytes of data from "../fixtures/foobar.txt" from offset "30"
        When I call "PATCH" "/tus/foobar1337"
        Then I should get a response with status code "400"

    Scenario: Mismatch between payload and specified content length
        Given The following files are in my store
            | resourceId | offset | length |
            | foobar1337 | 30     | 100    |
        And My request has the correct content type
        And My request has an offset of "30" and length of "70"
        And My request contains "60" bytes of data from "../fixtures/foobar.txt" from offset "30"
        When I call "PATCH" "/tus/foobar1337"
        Then I should get a response with status code "400"

    Scenario: Patch an existing file
        Given The following files are in my store
            | resourceId | offset | length |
            | foobar1337 | 30     | 100    |
        And My request has the correct content type
        And My request has an offset of "30" and length of "70"
        And My request contains "70" bytes of data from "../fixtures/foobar.txt" from offset "30"
        When I call "PATCH" "/tus/foobar1337"
        Then I should get a response with status code "200"