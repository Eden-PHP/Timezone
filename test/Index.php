<?php //-->
/**
 * This file is part of the Eden PHP Library.
 * (c) 2014-2016 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */
class EdenTimezoneIndexTest extends PHPUnit_Framework_TestCase
{

    public function testTimezone()
    {
		$class = eden('timezone', 'America/Los_Angeles');
		$this->assertInstanceOf('Eden\\Timezone\\Index', $class);
    }

    public function setup() 
	{
		date_default_timezone_set('GMT');
	}
    
	public function testConvertTo() 
	{
		//zone = Asia/Manila, time = 1358756901, date = January 21, 2013 8:28AM
		//zone = America/Los_Angeles, time = ?, date = January 20, 2013 5:28PM
		
		$date = eden('timezone', 'Asia/Manila', 1358756901)
			->convertTo('America/Los_Angeles', 'F d, Y g:iA');
		
		$this->assertEquals('January 20, 2013 5:28PM', $date);
                
                // reverse
		$date = eden('timezone', 'America/Los_Angeles', 1358702901)
			->convertTo('Asia/Manila', 'F d, Y g:iA');
		
		$this->assertEquals('January 21, 2013 8:28AM', $date);
	}
	
	public function testGetGMT() 
	{
		$gmt = eden('timezone', 'Asia/Manila')->getGMT();
		$this->assertEquals('GMT+800', $gmt);
	}
	
	public function testGetGMTDates() 
	{
		$dates = eden('timezone', 'Asia/Manila')->getGMTDates('F d, Y g:iA', 60);
		$this->assertEquals(25, count($dates));
		$this->assertArrayHasKey('GMT+800', $dates);
	}
	
	public function testGetOffset() 
	{
		$offset = eden('timezone', 'Asia/Manila')->getOffset();
		$this->assertEquals(28800, $offset);
	}
	
	public function testGetOffsetDates() 
	{
		$dates = eden('timezone', 'Asia/Manila')->getOffsetDates('F d, Y g:iA', 60);
		$this->assertEquals(25, count($dates));
		$this->assertArrayHasKey('28800', $dates);
	}
	
	public function testGetTime() 
	{
		$date = eden('timezone', 'Asia/Manila', 1358756901)
			->getTime('F d, Y g:iA');
			
		$this->assertEquals('January 21, 2013 8:28AM', $date);
	}
	
	public function testGetUTC() 
	{
		$utc = eden('timezone', 'Asia/Manila')->getUTC();
		$this->assertEquals('UTC+8:00', $utc);
	}
	
	public function testGetUTCDates() 
	{
		$dates = eden('timezone', 'Asia/Manila')->getUTCDates('F d, Y g:iA', 60);
		$this->assertEquals(25, count($dates));
		$this->assertArrayHasKey('UTC+8:00', $dates);
	}
	
	public function testSetTime() 
	{
	}
	
    public function testToRelative()
    {
		$class = eden('timezone', 'America/Los_Angeles', time() - 0);
		
		$offset = $class->getOffset();
		
		$this->assertEquals('Now', $class->toRelative(time() - $offset));
		
		///
		$class = eden('timezone', 'America/Los_Angeles', time() - 15);
		$this->assertEquals('15 seconds ago', $class->toRelative(time() - $offset));
		
		///
		$class = eden('timezone', 'America/Los_Angeles', time() - 3602);
		$this->assertEquals('1 hour ago', $class->toRelative(time() - $offset));
		
		///
		$class = eden('timezone', 'America/Los_Angeles', time() + 2);
		$this->assertEquals('Now', $class->toRelative(time() - $offset));
		
		///
		$class = eden('timezone', 'America/Los_Angeles', time() + 15);
		$this->assertEquals('15 seconds from now', $class->toRelative(time() - $offset));
		
		///
		$class = eden('timezone', 'America/Los_Angeles', time() + 3602);
		$this->assertEquals('1 hour from now', $class->toRelative(time() - $offset));
    }
	
	public function testValidation() 
	{
		$class = eden('timezone', 'Asia/Manila')->validation();
		$this->assertInstanceOf('Eden\\Timezone\\Validation', $class);
	}
    
}
