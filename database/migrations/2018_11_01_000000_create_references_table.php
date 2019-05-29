<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/21/19
 * Time: 7:15 AM
 */

class CreateReferencesTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('references', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('status')->default(config('refcode.default_status'));
            $table->timestamps();

            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('references');
    }
}