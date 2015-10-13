<?php //-->
/**
 * This file is part of the Eden PHP Library.
 * (c) 2014-2016 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */
class EdenTimezoneValidationTest extends PHPUnit_Framework_TestCase 
{
    public function testIsAbbr() 
	{
        $zone = 'abbr';
        $class = eden('timezone', $zone)->validation();
        $this->assertInstanceOf('Eden\\Timezone\\Validation', $class);
        $this->assertTrue((bool) $class->isAbbr('ABCDE'));
        $this->assertFalse((bool) $class->isAbbr('abcde'));
    }

    public function testIsLocation() 
	{
        $zone = 'location';
        $class = eden('timezone', $zone)->validation();
        $this->assertInstanceOf('Eden\\Timezone\\Validation', $class);
        $this->assertTrue((bool) $class->isLocation('Asia/Manila'));
    }

    public function testIsUtc() 
	{
        $zone = 'utc';
        $class = eden('timezone', $zone)->validation();
        $this->assertInstanceOf('Eden\\Timezone\\Validation', $class);
        $this->assertTrue((bool) $class->isUtc('GMT+8'));    
    }
}