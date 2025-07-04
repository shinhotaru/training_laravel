<?php

use Illuminate\Database\Seeder;
use App\Models\UserWalking;

class UserWalkingsTableSeeder extends Seeder
{
    public function run()
    {
        factory(UserWalking::class, 50)->create();
    }
}
