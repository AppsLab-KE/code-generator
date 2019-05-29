<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/22/19
 * Time: 10:28 AM
 */

namespace Unique\Refcode\Refcode\Generators;


use Unique\Refcode\Refcode\Contracts\BaseGenerator;

class MpesaGenerator extends BaseGenerator
{

    public static function generate()
    {
        return new self;
    }

    public function mpesaReference(int $length, $firstLetter = null)
    {
        return $this->randomCode($length,'mpesa', 'upper');
    }
}