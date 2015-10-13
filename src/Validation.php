<?php //-->
/**
 * This file is part of the Eden PHP Library.
 * (c) 2014-2016 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eden\Timezone;
 
/**
 * Timezone Validation Class
 *
 * @package  Eden
 * @category Timezone
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
class Validation extends Base
{
    const INSTANCE = 1;
    
    /**
     * Validates that value is a proper abbreviation
     *
     * @param *scalar $value The value to test against
     *
     * @return bool
     */
    public function isAbbr($value)
    {
        //argument 1 must be scalar
        Argument::i()->test(1, 'scalar');
        
        return preg_match('/^[A-Z]{1,5}$/', $value);
    }
    
    /**
     * Validates that value is a proper location
     *
     * @param *scalar $value The value to test against
     *
     * @return bool
     */
    public function isLocation($value)
    {
        //argument 1 must be scalar
        Argument::i()->test(1, 'scalar');
        
        return in_array($value, \DateTimeZone::listIdentifiers());
    }
    
    /**
     * Validates that value is a proper UTC
     *
     * @param *scalar $value The value to test against
     *
     * @return bool
     */
    public function isUtc($value)
    {
        //argument 1 must be scalar
        Argument::i()->test(1, 'scalar');
        
        return preg_match('/^(GMT|UTC){0,1}(\-|\+)[0-9]{1,2}(\:{0,1}[0-9]{2}){0,1}$/', $value);
    }
}
