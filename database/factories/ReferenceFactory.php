<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/21/19
 * Time: 7:38 AM
 */

use Unique\Refcode\Reference;

$factory->define(Reference::class, function (Faker\Generator $faker){

    return [
        'code' => \Unique\Refcode\Refcode\Generators\Generator::generate()->randomCode(5,'alphanumeric')
    ];
});