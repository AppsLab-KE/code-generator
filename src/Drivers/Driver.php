<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/23/19
 * Time: 7:48 AM
 */

namespace Unique\Refcode\Drivers;


abstract class Driver
{
    protected $config;

    public function __construct()
    {
        $this->setConfig();

        $this->validateSource();
    }

    private function setConfig()
    {
        $this->config = config_path('refcode.php');

    }

    protected function validateSource()
    {
        return true;
    }
}