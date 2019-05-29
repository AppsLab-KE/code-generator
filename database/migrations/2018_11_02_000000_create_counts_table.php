<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/21/19
 * Time: 7:15 AM
 */

class CreateCountsTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('counts', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('first_alphabet');
            $table->string('second_alphabet');
            $table->string('third_alphabet');
            $table->timestamps();

            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('counts');
    }
}