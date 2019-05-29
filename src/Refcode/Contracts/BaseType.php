<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/22/19
 * Time: 1:15 PM
 */

namespace Unique\Refcode\Refcode\Contracts;


abstract class BaseType
{
    protected $alphabetUpperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected $alphabetLowerCase = 'abcdefghijklmnopqrstuvwxyz';
    protected $numbers = '0123456789';
    protected $unicodeChars = "!#$&()*+,.-_/|@?><=;:%";

    abstract public function getGeneratorString();
}