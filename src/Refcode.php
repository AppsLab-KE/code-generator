<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/23/19
 * Time: 8:01 AM
 */

namespace Unique\Refcode;


class Refcode
{
    protected $types = [];

    public function path()
    {
        return config('refcode.path','reference-codes');
    }

    public function types(array $types)
    {
        $this->types = array_merge($this->types, $types);
    }

    public function availableTypes()
    {
        return $this->types;
    }
}