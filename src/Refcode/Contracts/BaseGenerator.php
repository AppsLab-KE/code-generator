<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/22/19
 * Time: 10:27 AM
 */

namespace Unique\Refcode\Refcode\Contracts;


use Illuminate\Support\Str;
use Unique\Refcode\Drivers\CacheDriver;
use Unique\Refcode\Exceptions\CodeNotCachedException;
use Unique\Refcode\Facades\Refcode;
use Unique\Refcode\Repositories\ReferenceRepositories;

abstract class BaseGenerator
{
    protected $referenceCode = null;

    abstract public static function generate();

    protected function randomCode(int $length, string $type = 'alphanumeric', string $codeCase = 'upper')
    {
        $class = $this->getType(Str::title($type));

        if (class_exists($class) && method_exists($class, 'getGeneratorString')){

            try{
                $alphanumerical = (new $class())->getGeneratorString();

                $max = strlen($alphanumerical);

                do{
                    for($i = 0; $i < $length; $i++){
                        $random = $this->cryptoRandomSecure(0, $max-1);
                        $this->referenceCode .= $alphanumerical[$random];
                    }
                } while($this->referenceCode == null);
//            } while(count(Reference::where('code', $this->referenceCode)->get()) > 0 || $this->referenceCode == null);

                $this->referenceCode = $codeCase == 'upper' ? strtoupper($this->referenceCode) : $this->referenceCode;

                return config('refcode.store_code') ? $this->storeGeneratedCode($this->referenceCode) : $this->referenceCode;
            }
            catch (\Exception $exception){
                dd($exception->getMessage());
            }
        }
    }

    private function cryptoRandomSecure($min, $max)
    {
        $range = $max - $min;

        if ($range < 1) return $min;

        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1;
        $bits = (int) $log + 1;
        $filter = (int) (1 << $bits) - 1;

        do{
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
        }while ($rnd > $range);

        return $min + $rnd;
    }



    private function storeGeneratedCode($code)
    {
        (new ReferenceRepositories())->save([
            'code' => $code,
            'status' => config('refcode.default_status')
        ]);


        if (! (new CacheDriver())->cacheCodes($code)){
            throw new CodeNotCachedException(
                'Unable to cache '. $code . ' reference code'
            );
        }


        return $code;
    }

    private function getType($type)
    {
        foreach (Refcode::availableTypes() as $availableType){
            $class = new \ReflectionClass($availableType);

            if ($class->getShortName() == $type){
                return $class->getName();
            }
        }
    }
}