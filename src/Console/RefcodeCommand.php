<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/21/19
 * Time: 8:58 AM
 */

namespace Unique\Refcode\Console;


use Illuminate\Console\Command;
use Unique\Refcode\Refcode\Generators\Generator;

class RefcodeCommand extends Command
{

    protected $signature = 'ref:generate {type} {--l|length=} {--c|case=}';
    
    protected $description = 'Create reference code';

    public function handle()
    {
        $getReferenceType = $this->argument('type');

        $this->info(Generator::generate()->randomCode(5,$getReferenceType));
    }
}