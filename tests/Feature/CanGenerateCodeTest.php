<?php

namespace Unique\Refcode\Tests;

use Unique\Refcode\MarkdownParse;
use Unique\Refcode\Refcode\Generators\Generator;

class CanGenerateCodeTest extends TestCase
{
    /** @test */
    public function can_generate_reference_code()
    {
//        dd(Generator::generate()->randomCode(60,'key','lower'));
        $this->assertTrue(is_string(Generator::generate()->randomCode(5,'alphanumeric','lower')));
    }

}