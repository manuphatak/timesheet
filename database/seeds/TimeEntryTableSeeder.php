<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laracasts\TestDummy\Factory as TestDummy;


class TimeEntryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('time_entry')->delete();

        TestDummy::times(7)->create('App\TimeEntry');
    }
}