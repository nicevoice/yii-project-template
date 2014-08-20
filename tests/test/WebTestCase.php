<?php
define('TEST_BASE_URL','http://cycms.com/tests/');

class WebTestCase extends CWebTestCase
{
	/**
	 * Sets up before each test method runs.
	 * This mainly sets the base URL for the test application.
	 */
	protected function setUp()
	{
		parent::setUp();
		$this->setBrowserUrl(TEST_BASE_URL);
        $this->setBrowser('*firefox');
	}
}
