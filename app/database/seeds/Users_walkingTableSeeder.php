<?php

use Illuminate\Database\Seeder;
use App\UserWalking;
use App\Models\User;

class Users_walkingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first();
        factory(App\UserWalking::class, 5)->create([
            'user_id' => $user->id,
        ]);
    }
}
