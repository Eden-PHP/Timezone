<?php //-->
/*
 * This file is part of the System package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Timezone;

/**
 * Argument Class
 *
 * @vendor Eden
 * @package Timezone
 * @author Christian Blanquera cblanquera@openovate.com
 */
class Argument extends \Eden\Core\Argument
{
    /**
     * Validates an argument given the type.
     *
     * @param *string   $type   type
     * @param *mixed    $data   the data
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
