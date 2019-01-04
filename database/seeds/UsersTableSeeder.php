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
        \App\User::truncate();
        \App\User::create([
            'name'=>'administrator',
            'email'=>'superadmin@mailinator.com',
            'email_verified_at'=>\Carbon\Carbon::now(),
            'password'=>bcrypt(123456)
        ]);
    }
}
