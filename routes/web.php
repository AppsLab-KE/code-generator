<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/23/19
 * Time: 9:24 AM
 */


Route::view('/','refcode::index');
Route::get('controller', [\Unique\Refcode\Http\Controllers\RefcodeController::class,'index']);

