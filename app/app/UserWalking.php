<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWalking extends Model
{
     protected $fillable = [
         'walking_on',
         'step_cnt',
     ];
}
