<?php

error_reporting(-1);
date_default_timezone_set('UTC');

define('ROOT', realpath(dirname(__DIR__) . '/../../..'));

// Include the composer autoloader
$loader = require ROOT . '/vendor/autoload.php';
//$loader->add('Aws\\Test', __DIR__);

// Register services with the GuzzleTestCase
Guzzle\Tests\GuzzleTestCase::setMockBasePath(__DIR__ . '/mock');

// Configure the tests to use the instantiated AWS service builder
//Guzzle\Tests\GuzzleTestCase::setServiceBuilder($aws);

// Emit deprecation warnings
Guzzle\Common\Version::$emitWarnings = true;

$bizlunchAPI = new \bizlunch\test\services\BizlunchAPI();

function can_mock_internal_classes()
{
    switch (substr(PHP_VERSION, 0, 3)) {
        case '5.3.':
            return true;
        case '5.4.':
            return version_compare(PHP_VERSION, '5.4.30', '<');
        case '5.5.':
            return version_compare(PHP_VERSION, '5.5.14', '<');
        default:
            return false;
    }
}
