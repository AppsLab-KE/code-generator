<?php
/**
 * Created by PhpStorm.
 * User: marvincollins
 * Date: 5/21/19
 * Time: 7:37 AM
 */

namespace Unique\Refcode;


use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'code'
    ];
}