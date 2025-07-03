<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWalking extends Model
{
    protected $table = 'user_walkings'; 

    protected $fillable = [
        'user_id',
        'walking_on',
        'step_cnt',
    ];
}
