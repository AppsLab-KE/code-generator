<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/21/19
 * Time: 7:02 AM
 */

namespace Unique\Refcode\Tests;


use Unique\Refcode\RefcodeServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/../database/factories');

    }

    public function getPackageProviders($app)
    {
        return [
            RefcodeServiceProvider::class,
        ];
    }


    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default','testdb');
        $app['config']->set('database.connections.testdb',[
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);
    }
}