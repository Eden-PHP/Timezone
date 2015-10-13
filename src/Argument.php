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
 * Argument Class
 *
 * @package  Eden
 * @category Timezone
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
class Argument extends \Eden\Core\Argument
{
    /**
     * Validates an argument given the type.
     *
     * @param *string $type The timezone value type to test
     * @param *mixed  $data The data to test against
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
