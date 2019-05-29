<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/22/19
 * Time: 1:10 PM
 */

namespace Unique\Refcode\Refcode\ReferenceTypes;


use Unique\Refcode\Refcode\Contracts\BaseType;

class Key extends BaseType
{
    public function getGeneratorString()
    {
        return $this->alphabetUpperCase.$this->alphabetLowerCase.$this->numbers.$this->unicodeChars;
    }
}