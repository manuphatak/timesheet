<?php // database/seeds/TimeEntryTableSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Laracasts\TestDummy\Factory as TestDummy;

class TimeEntryTableSeeder extends Seeder
{

    protected $faker;

    function __construct(Faker $faker)
    {
        $this->faker = $faker->create();
    }

    public function run()
    {
        DB::table('time_entry')->delete();

        for ($i = 0; $i <= 7; $i++) {
            TestDummy::create('App\TimeEntry',
                              [
                                  'comment' => $this->faker->optional(
                                      $weight = 0.5)->sentence()
                              ]);
        }
    }
}