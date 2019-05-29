<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/23/19
 * Time: 2:26 PM
 */

namespace Unique\Refcode\Repositories;


use Unique\Refcode\Reference;

class ReferenceRepositories
{
    public function save(array $code)
    {
        Reference::updateOrCreate([
            'code' => $code['code']
        ],[
            'code' => $code['code'],
            'status' => $code['status']
        ]);
    }
}