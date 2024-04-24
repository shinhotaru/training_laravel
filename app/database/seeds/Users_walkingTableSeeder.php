<?php

use Illuminate\Database\Seeder;
use App\Userworking;

class Users_walkingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Userworking::class, 10)->create();
    }
}
