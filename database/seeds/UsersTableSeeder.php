<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new App\User;
      $user->name = "gitam";
      $user->email = "g@gmail.com";
      $user->password=Hash::make("123456");
      $user->user_type="admin";
      $user->save();
    }
}
