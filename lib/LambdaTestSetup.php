<?php

require 'lib/globals.php';
require_once('vendor/autoload.php');

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\Assert;

class LambdaTestSetup extends PHPUnit\Framework\TestCase{
    protected static $driver;

    public function setUp(): void
    {        
        
		$url = "https://". $GLOBALS['LT_USERNAME'] .":" . $GLOBALS['LT_ACCESS_KEY'] ."@hub.lambdatest.com/wd/hub";

	$capabilities = array(
		"build" => "Sample PHPUnit Build",
		"name" => "Sample PHPUnit Test",
		"deviceName" => "iPad (5th generation)",
		"browserName" => "Safari",
		"platformVersion" => "10.3"
     );	
		
		self::$driver = RemoteWebDriver::create($url, $capabilities); 		
		
    }
	
	public  function tearDown(): void{
		self::$driver->quit();
	}
}
?>
