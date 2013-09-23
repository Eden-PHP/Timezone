<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Timezone;

/**
 * Core Factory Class
 *
 * @vendor Eden
 * @package Core
 * @author Christian Blanquera cblanquera@openovate.com
 */
class Factory extends Base
{
    const INSTANCE = 1;
	
	/**
     * Returns the timezone class
     *
	 * @param string
	 * @param int|string|null
     * @return Eden\Timezone\Timezone
     */
	public function timezone($zone, $time = null) 
	{
		Argument::i()
			->test(1, 'string')
			->test(1, 'location', 'utc', 'abbr')
			->test(2, 'int', 'string', 'null');
		
		return Timezone::i($zone, $time);
	}
	
	/**
     * Returns the validation class
     *
	 * @param *mixed
     * @return Eden\Timezone\Validation
     */
	public function validation($value) 
	{	
		return Validation::i($value);
	}
}