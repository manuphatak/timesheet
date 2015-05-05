<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laracasts\TestDummy\Factory as TestDummy;


class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        TestDummy::times(10)->create('App\User');

        TestDummy::create('App\User', ['email' => 'user@fake.com']);
        TestDummy::create('App\User', ['email' => 'admin@fake.com']);
    }
}