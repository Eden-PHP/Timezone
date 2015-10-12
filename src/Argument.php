<?php //-->
/**
 * This file is part of the Eden package.
 * (c) 2014-2016 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Eden\Timezone;

/**
 * The base class for any class handling exceptions. Exceptions
 * allow an application to custom handle errors that would
 * normally let the system handle. This exception allows you to
 * specify error levels and error types. Also using this exception
 * outputs a trace (can be turned off) that shows where the problem
 * started to where the program stopped.
 *
 * @vendor   Eden
 * @package  timezone
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
class Argument extends \Eden\Core\Argument
{
    /**
     * Validates an argument given the type.
     *
     * @param *string
     * @param *mixed
     *
     * @return bool
     */
    protected function isValid($type, $data)
    {
        $valid = Validation::i();

        switch ($type) {
            case 'location':
                return $valid->isLocation($data);
            case 'utc':
                return $valid->isUtc($data);
            case 'abbr':
                return $valid->isAbbr($data);
            default:
                break;
        }

        return parent::isValid($type, $data);
    }
}
