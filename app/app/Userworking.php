<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userworking extends Model
{
     //テーブル名
     protected $table = 'user_walkings';

     //可変項目
     protected $fillable = 
     [
         'user_id',
         'walking_on',
         'step_cnt',
     ];
}
