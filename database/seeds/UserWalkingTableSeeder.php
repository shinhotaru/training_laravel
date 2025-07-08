<?php

use Illuminate\Database\Seeder;
use App\Models\UserWalking;

class UserWalkingTableSeeder extends Seeder
{
    public function run()
    {
      factory(UserWalking::class, 20)->create();
    }
}
