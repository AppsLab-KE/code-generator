<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/23/19
 * Time: 2:06 PM
 */

namespace Unique\Refcode\Facades;


use Illuminate\Support\Facades\Facade;

class Refcode extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Refcode';
    }
}