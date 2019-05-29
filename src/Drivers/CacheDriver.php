<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/23/19
 * Time: 7:52 AM
 */

namespace Unique\Refcode\Drivers;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Unique\Refcode\Exceptions\CacheNotFoundException;
use Unique\Refcode\Reference;

class CacheDriver extends Driver
{
    public function fetchCodes()
    {
        $codes = Cache::rememberForever('codes', function (){
            return Reference::all('code')->toArray();
        });

        return $codes;
    }

    protected function validateSource()
    {
        if (! File::exists($this->config)){
            throw new CacheNotFoundException(
                'Directory at \''. $this->config.
                '\' does not exist. Check the directory path in the config file.'
            );
        }
    }

    public function cacheCodes($code)
    {
        // TODO: implement cache
        return $code;
    }
}