<?php

use Illuminate\Database\Seeder;
use App\UserWalking;

class Users_walkingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserWalking::class, 5)->create();
    }
}
