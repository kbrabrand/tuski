<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Silex\Application;
use Vaffel\Tuski\Silex\Provider\TusBuilder;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @Given The following files are in my store
     */
    public function theFollowingFilesAreInMyStore(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When I call :method :path
     */
    public function iCall($method, $path)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get a :headerName header with the value :headerValue
     */
    public function iShouldGetAHeaderWithTheValue($headerName, $headerValue)
    {
        throw new PendingException();
    }

    /**
     * @Given My request has the content type :contentType
     */
    public function myRequestHasTheContentType($contentType)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get a response with status code :statusCode
     */
    public function iShouldGetAResponseWithStatusCode($statusCode)
    {
        throw new PendingException();
    }

    /**
     * @Given My request has the correct content type
     */
    public function myRequestHasTheCorrectContentType()
    {
        throw new PendingException();
    }

    /**
     * @Given My request has no :headerName header
     */
    public function myRequestHasNoHeader($headerName)
    {
        throw new PendingException();
    }

    /**
     * @Given My request has a :headerName header with the value :arg2
     */
    public function myRequestHasAHeaderWithTheValue($headerName, $header)
    {
        throw new PendingException();
    }

    /**
     * @Given My request has an offset of :offset and length of :contentLength
     */
    public function myRequestHasAnOffsetOfAndLengthOf($offset, $contentLength)
    {
        throw new PendingException();
    }

    /**
     * @Given My request contains :length bytes of data from :file from offset :offset
     */
    public function myRequestContainsBytesOfDataFromFromOffset($length, $file, $offset)
    {
        throw new PendingException();
    }
}
