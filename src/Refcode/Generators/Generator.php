<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/22/19
 * Time: 10:28 AM
 */

namespace Unique\Refcode\Refcode\Generators;


use Unique\Refcode\Refcode\Contracts\BaseGenerator;

class Generator extends BaseGenerator
{

    public static function generate()
    {
        return new self;
    }

    public function randomCode(int $length, string $type = 'alphanumeric', string $codeCase = 'upper')
    {
        return parent::randomCode($length, $type, $codeCase);
    }
}